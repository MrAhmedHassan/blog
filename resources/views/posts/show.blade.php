@extends('layouts.app')

@section('content')

@php
use Carbon\Carbon;
@endphp

<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title">Title:</h5>
        <p class="card-text">{{$postData->title}}</p>
        <h5 class="card-title">Description:</h5>
        <p class="card-text">{{$postData->description}}</p>
    </div>
</div>

<div class="card">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        <h5 class="card-title">Name:</h5>
        <p class="card-text">{{$postData->user->name }}</p>
        <h5 class="card-title">Email:</h5>
        <p class="card-text">{{$postData->user->email}}</p>
        <h5 class="card-title">Created At:</h5>
        <p class="card-text">{{Carbon::parse($postData->created_at)->format('l jS \\of F Y h:i:s A')}}</p>
    </div>
</div>

@endsection
