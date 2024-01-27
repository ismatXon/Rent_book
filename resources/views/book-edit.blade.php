@extends('layouts.MainLayout')

@section('title','edit Book')

@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <h1>Edit Book</h1>

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
        <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="book_code" class="form-label">Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" value="{{ $book->book_code }}" placeholder="Book Code">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
               <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="CurrentImage" class="form-label" style="display: block"> Current Image</label>
                <div>
                    @if ($book->cover != '')
                    <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="200px">
                    @else
                    <img src="{{ asset('img/cover-not-found.jpg') }}" alt="" width="200px">
                    @endif
                </div>
            </div>


            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories" id="category " class="form-control select-multiple" >
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
    
            </div>

            <div class="mb-3">
                <label for="CurrentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($book->categories as $category)
                    <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>

    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
