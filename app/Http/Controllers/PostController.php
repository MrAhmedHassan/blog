<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StoreUpdatePostRequest;
use Carbon\Carbon;


class PostController extends Controller
{
    //
    public function index()
    {
        // $posts = paginate(3);
        return view('posts.index', [
            'posts' => Post::with('user')->paginate(3)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreUpdatePostRequest $request)
    {
        // Validator::make(request()->all(), [
        //     'title' => 'required',
        //     'description' => 'required',
        // ])->validate();
        // get the obj of auth user data

        // $slugedTitle = str_slug($request->title);
        $obj =  request()->user();
        // dd($obj->id);
        Post::create([
            'title' => $request->title,
            'description' => $request->description,

            'user_id' => $obj->id,
            // 'slug_title' => $slugedTitle
        ]);

        return redirect(route('posts.index'));
    }

    public function show($post)
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

    public function edit($post)
    {
        $postData = Post::find($post);
        return view('posts.edit', [
            "postData" => $postData
        ]);
    }

    public function update(StoreUpdatePostRequest $request, $post)
    {
        $postData = Post::find($post);
        $postData->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);
        return redirect(route('posts.index'));
    }

    public function destroy($post)
    {
        $postData = Post::find($post);
        $postData->delete();
        return redirect(route('posts.index'));
    }
}
