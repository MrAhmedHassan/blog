@extends('layouts.app')

@section('content')

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
                <th scope="col">Description</th>
                <th scope="col">Posted By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $index => $value)
            <tr>
                <th scope="row">{{$index+1}}</th>
                <td>{{$value['title']}}</td>
                <td>{{$value['description']}}</td>
                <td>{{$value['creator']}}</td>
                <td>
                    <a href="{{route('posts.show',['post' => $value['id']])}}"><button class="btn btn-primary">View</button></a>
                    <a href="{{route('posts.edit',['post' => $value['id']])}}"><button class="btn btn-success">Edit</button></a>
                    <form method="post" action="posts/{{$value['id']}}">
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

   @endsection