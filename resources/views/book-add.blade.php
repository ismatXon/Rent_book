@extends('layouts.MainLayout')

@section('title','Add Book')

@section('content')


    <h1>Add New Book</h1>

    @if ($errors->any())
    <div class="alert alert-danger" style="width: 500px">
        <ul>
            @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="mt-5 w-50">
        <form action="book-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="book_code" class="form-label">Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book Code">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
               <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection