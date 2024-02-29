
@extends('layouts.MainLayout')

@section('title','Delete Book')

@section('content')
    <h1>Are you sure to delete Book {{ $book->name }}</h1>

    <div class="mt-5">
        <a href="/book-destroy/{{ $book->slug }}" class="btn btn-danger me-5" >Sure</a>
        <a href="/books" class=" btn btn-success">Cancel</a>
    </div>
@endsection