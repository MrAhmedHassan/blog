<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::with('user')->get();
        // $postss = Post::all();
        // dd($post);
        // dd($postss);
        $posts = Post::paginate(2);
        // $arr = [];

        // foreach ($posts as $post) {
        //     // array_push($arr, [
        //     //     'id' => $post->id,
        //     //     'title' => $post->title
        //     // ]);
        //     //the same code
        //     $arr[] =  [
        //         'id' => $post->id,
        //         'title' => $post->title
        //     ];
        // }
        // use PostResource to make mapping(filteration to result);
        return PostResource::collection($posts);
        // return Post::all();
    }

    public function show($id)
    {
        $post = Post::find($id);

        // i can use PostResource to make mapping
        return new PostResource($post);
        // dd($post);
    }

    public function store()
    {
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->user()->id
        ]);
    }
}
