@extends('layouts.app')

@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
        <div class="col">
            <a href="{{route('posts.create')}}"><button class="btn btn-success">Create Post</button></a>
        </div>
    </div>
</div>

<div class="container"></div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">TitleSlug</th>
            <th scope="col">Description</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $index => $post)
        <tr>
            <th scope="row">{{$index+1}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post['slug_title']}}</td>
            <td>{{$post['description']}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{Carbon::parse($post['created_at'])->format('Y-m-d')}}</td>
            <td>
                <a href="{{route('posts.show',['post' => $post['id']])}}"><button class="btn btn-primary">View</button></a>
                <a href="{{route('posts.edit',['post' => $post['id']])}}"><button class="btn btn-success">Edit</button></a>
                <form method="post" action="posts/{{$post['id']}}" style="display: inline-block">
                    {{method_field('DELETE')}}
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm(" Do you want to remove item")'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
{{$posts->links()}}

@endsection
