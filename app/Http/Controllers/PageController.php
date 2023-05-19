<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    function index($cat){
        $page=Page::where('slug',$cat)->first();
        // return $page;
        return view('page.index',compact('page'));
    }
}
