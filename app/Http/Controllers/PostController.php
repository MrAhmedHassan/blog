<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function index()
    {
        // return view('')
        return view('posts.index');
    }

    function create()
    {
        return view('posts.create');
    }
}
