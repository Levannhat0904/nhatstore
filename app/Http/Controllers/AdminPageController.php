<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    //
    function __construct(Request $request, Middleware $next)
    {
        $this->middleware(function ($request,  $next) {
            session(['module_active' => 'page']);
            return $next($request);
        });
    }
    function add(){
        return view('admin.page.add');
    }
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
        // $cat_id = cat::select('id')->where('catagory_item', "$cat")->get();
        // return $cat_id[0]->id;// trả về id của danh mục con
        $post = array([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat' => $request->input('category'),
            'user_id' =>  Auth::id()
        ]);
        // return $post;

        Page::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'cat' => $request->input('category'),
            'user_id' =>  Auth::id()
        ]);
        return redirect('admin/page/list')->with('status', 'Thêm bài viết thành công');

        // print_r($post) ;


        // return $cats;    

        // $user = Auth::user();

        // // Retrieve the currently authenticated user's ID...
        // $id = Auth::id();
        // return $id;

    }
    function edit($id)
    {
        $page_edit = Page::find($id);
        
        return view('admin.page.edit', compact('page_edit'));
    }
    function action(Request $request)
    {
        $list_check = $request->input('list_check');
        // return $list_check;
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
                    Page::destroy($list_check);
                    return redirect('admin/page/list')->with('status', 'Bạn đã xóa thành công');
                }
                if ($act == 'restore') {
                    // return "haha";
                    Page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/page/list')->with('status', 'Bạn đã khôi phục thành công');
                }
                if ($act == 'forceDelete') {
                    Page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/page/list')->with('status', 'Bạn đã xóa vĩnh viễn bài viết ra khỏi hệ thống thành công');
                }
            }
        }
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
            $pages = Page::onlyTrashed()->paginate(10);
        } else {

            $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
            // $users= User::all();// lấy ra toàn bộ user có trong hệ thống
            $pages = Page::where('title', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        // lấy ra user tạo nên bài viết
        // $user = Post::find(1)->user;
        // return $user;

        // lấy ra các bài vuết của 1 User
        // $post= User::find(4)->posts;
        // return $post;
        // $posts=Post::paginate(10);
        // return $posts;
        $count_page_active = Page::count();
        $count_page_trash = Page::onlyTrashed()->count();
        $count = [$count_page_active, $count_page_trash];
        //  return $posts;
        return view('admin.page.list', compact('pages', 'count', 'list_act'));
    }
    function update(Request $request, $id)
    {
        if ($request->input('btn_update')) {
            // return "dfdf";
            // return $request->input();//goi ra tât cả bản gi và dc hiện trên url
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
            // return $cat_id[0]->id;// trả về id của danh mục con
            // return "haha";
            Page::where('id', $id)->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'cat' => $request->input('category'),
                'user_id' =>  Auth::id()
            ]);
            return redirect('admin/page/list')->with('status', 'đã cập nhật bài viết thành công');
        }
    }
    function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('admin/page/list')->with('status', 'Đã xóa bài viết thành công');
    }
}
