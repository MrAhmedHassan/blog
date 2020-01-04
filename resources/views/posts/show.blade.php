@extends('layouts.app')

@section('content')
<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title">Title:</h5>
        <p class="card-text">{{$postData->title}}</p>
        <h5 class="card-title">Description:</h5>
        <p class="card-text">{{$postData->description}}</p>
        <h5 class="card-title">Created At:</h5>
        <p class="card-text">{{$postData->created_at}}</p>
    </div>
</div>

@endsection
