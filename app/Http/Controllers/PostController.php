<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    function index()
    {

        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    function create()
    {
        return view('posts.create');
    }

    function store()
    {
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'creator' => request()->creator
        ]);

        return redirect(route('posts.index'));
    }

    function show($post)
    {
        $postData = Post::find($post);
        $id = $postData->id;
        $title = $postData->title;
        $description = $postData->description;
        $createAt = $postData->created_at;
        return view('posts.show', [
            "postData" => $postData
        ]);
    }

    function edit($post)
    {
        $postData = Post::find($post);
        return view('posts.edit', [
            "postData" => $postData
        ]);
    }

    function update($post)
    {
        $postData = Post::find($post);
        $postData->update([
            'title' => request()->title,
            'description' => request()->description,
            'creator' => request()->creator
        ]);
        return redirect(route('posts.index'));
    }

    function destroy($post)
    {
        $postData = Post::find($post);
        $postData->delete();
        return redirect(route('posts.index'));
    }
}
