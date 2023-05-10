<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class AdminPostController extends Controller
{
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request,  $next) {
            session(['module_active' => 'post']);
            return $next($request);
        });
    }
    //
    function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung',
                'category' => 'Danh mục'
            ]
        );
        $cat = $request->input('category');
        $cat_id = cat::select('id')->where('catagory_item', "$cat")->get();
        // return $cat_id[0]->id;// trả về id của danh mục con
        $post = array([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id[0]->id,
            'user_id' =>  Auth::id()
        ]);
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id[0]->id,
            'user_id' =>  Auth::id()
        ]);
        return redirect('admin/post/list')->with('status', 'Thêm bài viết thành công');

        // print_r($post) ;


        // return $cats;

        // $user = Auth::user();

        // // Retrieve the currently authenticated user's ID...
        // $id = Auth::id();
        // return $id;

    }
    function edit($id)
    {
        $post = Post::find($id);
        $cat_policy = cat::where('catagorys', 'Chính sách')->get();
        $cat_new = cat::where('catagorys', 'Tin tức')->get();
        //    return $cats;
        // return view('admin.post.add', compact('cat_policy', 'cat_new'));
        return view('admin.post.edit', compact('post', 'cat_policy', 'cat_new'));
    }
    function update(Request $request, $id)
    {
        if ($request->input('btn_update')) {
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
            $request->validate(
                [
                    'title' => 'required',
                    'content' => 'required',

                ],
                [
                    'required' => ":attribute không được để trống",
                    'min' => ":attribute có độ dài ít nhất :min kí tự",
                    'max' => ":attribute có độ dài tối đa :max kí tự",
                    'confirmed' => ":attribute xác nhận mật khẩu không thành công",
                ],
                [
                    'name' => 'Tên người dùng',
                    'password' => 'Mật khẩu'
                ]
            );
            $cat = $request->input('category');
            $cat_id = cat::select('id')->where('catagory_item', "$cat")->get();
            // return $cat_id[0]->id;// trả về id của danh mục con
            // return "haha";
            Post::where('id', $id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'cat_id' => $cat_id[0]->id,
                'user_id' =>  Auth::id()
            ]);
            return redirect('admin/post/list')->with('status', 'đã cập nhật bài viết thành công');
        }
    }
    function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post/list')->with('status', 'Đã xóa bài viết thành công');
    }

    function list(Request $request)
    {
        $list_act = [
            'delete' => 'xóa tạm thời'
        ];
        $status = $request->input('status');
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $posts = Post::onlyTrashed()->paginate(10);
        } else {

            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            // $users= User::all();// lấy ra toàn bộ user có trong hệ thống
            $posts = Post::where('title', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        // lấy ra user tạo nên bài viết
        // $user = Post::find(1)->user;
        // return $user;

        // lấy ra các bài vuết của 1 User
        // $post= User::find(4)->posts;
        // return $post;
        // $posts=Post::paginate(10);
        // return $posts;
        $count_post_active = Post::count();
        $count_post_trash = Post::onlyTrashed()->count();
        $count = [$count_post_active, $count_post_trash];
        //  return $posts;
        return view('admin.post.list', compact('posts', 'count', 'list_act'));
    }
    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            // foreach ($list_check as $k => $id) {
            //     if (Auth::id() == $id) { //kiểm tra xem ô bị tích có phải là mình k
            //         unset($list_check[$k]); //xóa id của mình khỏi nhưng user bị xóa

            //     }
            // }
            if (!empty($list_check)) {
                $act = $request->input('act');
                // return $act; 
                if ($act == 'delete') {
                    // return "hii";
                    Post::destroy($list_check);
                    return redirect('admin/post/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    // return "haha";
                    Post::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/post/list')->with('status', 'Bạn đã khôi phục thành công');
                }
                if ($act == 'forceDelete') {
                    Post::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/post/list')->with('status', 'Bạn đã xóa vĩnh viễn bài viết ra khỏi hệ thống thành công');
                }
            }
        }
    }
    function add()
    {
        // $cats = cat::all();
        $cat_policy = cat::where('catagorys', 'Chính sách')->get();
        $cat_new = cat::where('catagorys', 'Tin tức')->get();
        //    return $cats;
        return view('admin.post.add', compact('cat_policy', 'cat_new'));

        //lấy ra id user đang đăng nhập
        // $user = Auth::user();
        // $id = Auth::id();
        // return $id;
    }

    function cat()
    {
        $cats = cat::select('catagorys')->distinct()->get();
        // $cats= $cat->catagorys;
        $cat_items = cat::all();
        return view('admin.post.cat', compact('cats', 'cat_items'));
    }
    function cat_add(Request $request)
    {
        if ($request->input('btn_add')) {
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
            $request->validate(
                [
                    'parent' => 'required',
                    'item' => 'required',

                ],
                [
                    'required' => ":attribute không được để trống",
                ],
                [
                    'item' => 'Danh mục',
                    'parent' => 'Danh mục cha'
                ]
            );

            cat::create([
                'catagorys' => $request->input('parent'),
                'catagory_item' => $request->input('item')
            ]);
            return redirect('admin/post/cat')->with('status', 'Đã thêm danh mục thành công');
        }
    }
    function edit_cat($id){

        $cat_edit = cat::find($id);
        $cats = cat::select('catagorys')->distinct()->get();
        // $cats= $cat->catagorys;
        $cat_items = cat::all();
        return view('admin.post.edit_cart', compact('cats', 'cat_edit', 'cat_items'));
        
    }
    function update_cat(Request $request, $id){
        if ($request->input('btn_add')) {
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
            $request->validate(
                [
                    'parent' => 'required',
                    'item' => 'required',

                ],
                [
                    'required' => ":attribute không được để trống",
                ],
                [
                    'item' => 'Danh mục',
                    'parent' => 'Danh mục cha'
                ]
            );

            cat::where('id', $id)->update([
                'catagorys' => $request->input('parent'),
                'catagory_item' => $request->input('item'),
                
            ]);
            return redirect('admin/post/cat')->with('status', 'đã cập nhật danh mục thành công');
        }
    }
    function delete_cat($id){
        $cat = cat::find($id);
        $cat->delete();
        return redirect('admin/post/cat')->with('status', 'Đã xóa danh mục thành công');
    }
}
