<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $user = "";
        if (!empty(Auth::user()->name)) {

            $user = Auth::user()->name;
        }
        // return view('user.profile', compact('user'));
        return view('blog.blog', compact('user'));
    }
}
