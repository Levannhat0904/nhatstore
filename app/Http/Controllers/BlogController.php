<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class BlogController extends Controller
{
    //
    function index(){
        $posts = Post::OrderBy('id', 'desc')->paginate(10);;
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('blog.blog', compact('posts','user'));
    }
    function detail($id){
        $post = Post::find($id);
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        return view('blog.detail', compact('post','user'));
    }
}
