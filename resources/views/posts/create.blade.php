@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/posts">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Post Creator</label>
                <input type="text" class="form-control" name="creator" id="exampleInputPassword1">
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </form>
    </div>
   @endsection