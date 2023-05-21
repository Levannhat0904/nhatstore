<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\cat_post;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule as ValidationRule;

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
                'category' => 'required',
                'img' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'img'=>'Hình ảnh',
                'title' => 'Tiêu đề',
                'content' => 'Nội dung',
                'category' => 'Danh mục'
            ]
        );
        //   return $request->all();
        $cat_id = $request->input('category');
        if ($request->hasFile('img')){
            $img=$request->file('img')->getClientOriginalName();
            $path = $request->file('img')->move('img_post', $img); 
            $img_post="img_post/".$img;
            $input['img'] = $img_post;
        }
        // return $cat_id[0]->id;// trả về id của danh mục con
        $post = array([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id,
            'user_id' =>  Auth::id()
        ]);
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id,
            'user_id' =>  Auth::id(),
            'img'=>$input['img']
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
        
        $cat_post = cat_post::with('cat')
            ->get()
            ->groupBy(function ($post) {
                return Str::slug($post->cat->cat);
            });
        return view('admin.post.edit', compact('cat_post', 'post'));
        // return view('admin.post.edit', compact('post', 'cat_policy', 'cat_new'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
                'img' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung',
                'category' => 'Danh mục',
                'img'=>'Hình ảnh'
            ]
        );
        if ($request->hasFile('img')){
            $img=$request->file('img')->getClientOriginalName();
            $path = $request->file('img')->move('img_post', $img); 
            $img_post="img_post/".$img;
            $input['img'] = $img_post;
        }
        //   return $request->all();
        $cat_id = $request->input('category');
        // return $cat_id[0]->id;// trả về id của danh mục con
        $post = array([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id,
            'user_id' =>  Auth::id()
        ]);
        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat_id' => $cat_id,
            'img'=>$input['img'],
            'user_id' =>  Auth::id()
        ]);
        return redirect('admin/post/list')->with('status', 'Cập bài viết thành công');
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
        }
        if($status == 'active'){
            $posts = Post::paginate(10);
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
        $cat_post = cat_post::with('cat')
            ->get()
            ->groupBy('cat_id');
        $cat_post = cat_post::with('cat')
            ->get()
            ->groupBy(function ($post) {
                return Str::slug($post->cat->cat);
            });
        return view('admin.post.add', compact('cat_post'));
    }

    function cat()
    {
        $cat_post = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'post';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        $cat_post_item = cat_post::orderBy('cat_id', 'asc')->get();
        return view('admin.post.cat', compact('cat_post', 'cat_post_item'));
    }
    function cat_add(Request $request)
    {
        
        $validatedData = $request->validate([
            'cat_item' => ['required', 'unique:cat_posts', 'max:255'],
            'cat_parent' => 'required',
        ]);
        // return $request->all();

        cat_post::create([
            'cat_item' => $request->input('cat_item'),
            'cat_id' => $request->input('cat_parent')
        ]);
        return redirect('admin/post/cat')->with('status', 'Đã thêm danh mục thành công');
    }
    function cat_parent(Request $request)
    {
        $cat = $request->input('cat');
        $slug = "post." . $cat;
        // return $slug;
        $validatedData = $request->validate([
            'cat' => ['required', 'unique:cats', 'max:255'],

        ]);
        cat::create([
            'cat' => $cat,
            'slug' => $slug
        ]);
        return redirect('admin/post/cat')->with('status', 'Đã thêm danh mục thành công');
    }
    function edit_cat_item($id)
    {
        $cat_post_item = cat_post::all();
        $cat_edit = cat_post::find($id);
        $cat_post = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'post';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        return view('admin.post.edit_cat_item', compact('cat_post', 'cat_edit', 'cat_post_item'));
    }
    function update_cat_item(Request $request, $id)
    {
        // return $id;
        $cat_post=cat_post::find($id);
        // return  $cat_item;
        $validatedData = $request->validate([
            // 'cat_item' => 'required|max:255|unique:cat_posts,cat,'.$cat_post->id,
            'cat_item' => [
                'required',
                'max:255',
                Rule::unique('cat_posts')->ignore($cat_post->id, 'id'),
            ],
            'cat_parent' => 'required',
        ]);

        cat_post::where('id', $id)->update([
            'cat_item' => $request->input('cat_item'),
            'cat_id' => $request->input('cat_parent')

        ]);
        return redirect('admin/post/cat')->with('status', 'đã cập nhật danh mục thành công');
    }

    function delete_cat_item($id)
    {
        $cat_item_delete = cat_post::find($id);
        $cat_item_delete->delete();
        return redirect('admin/post/cat')->with('status', 'Đã xóa danh mục thành công');
    }
    function edit_cat($id)
    {

        $cat_edit = cat::find($id);
        $cat_post = cat::all()->where(function ($cat) {
            return explode('.', $cat->slug)[0] === 'post';
        })->groupBy(function ($cat) {
            return explode('.', $cat->slug)[0];
        });
        return view('admin.post.edit_cat', compact('cat_post', 'cat_edit'));
    }
    function update_cat(Request $request, $id)
    {
        $cat_edit =cat::find($id);
        $cat = $request->input('cat');
        $slug = "post." . $cat;
        // return $slug;
        $validatedData = $request->validate([
            'cat' => [
                'required',
                'max:255',
                Rule::unique('cats')->ignore($cat_edit->id, 'id'),
            ],

        ]);
        cat::where('id', $id)->update([
            'cat' => $cat,
            'slug' => $slug
        ]);
        return redirect('admin/post/cat')->with('status', 'Đã cập nhật danh mục thành công');
    }
    function delete_cat($id)
    {
        $cat_item_delete = cat::find($id);
        $cat_item_delete->delete();
        return redirect('admin/post/cat')->with('status', 'Đã xóa danh mục thành công');
    }
}
