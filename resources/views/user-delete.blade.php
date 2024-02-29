
@extends('layouts.MainLayout')

@section('title','Delete Book')

@section('content')
    <h1>Are you sure to delete Book {{ $user->username }}</h1>

    <div class="mt-5">
        <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger me-5" >Sure</a>
        <a href="/users" class=" btn btn-success">Cancel</a>
    </div>
@endsection