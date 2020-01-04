@extends('layouts.app')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <form method="post" action="/posts/{{$postData->id}}">
        {{method_field('PUT')}}
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="{{$postData->title}}" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$postData->description}}</textarea>
        </div>

        <button type="submit" name="edit" class="btn btn-warning">Edit</button>
    </form>
</div>

@endsection
