@extends('layouts.MainLayout')

@section('title','Delete Category')

@section('content')
    <h1>Are you sure to delete Category {{ $category->name }}</h1>

    <div class="mt-5">
        <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger me-5" >Sure</a>
        <a href="/categories" class=" btn btn-success">Cancel</a>
    </div>
@endsection