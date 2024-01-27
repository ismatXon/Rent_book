@extends('layouts.MainLayout')



@section('page-name','dashboard')
@section('title','Books')
@section('content')
    <h2>Book List</h2>

    <div class="my-5">
        @if (session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check"></i> {{ session('status') }}
            </div>  
        @endif
    </div>
    

    <div class="my-5 d-flex justify-content-end">
        <a href="book-add" class="btn btn-success"><i class="far fa-plus-square"></i> Add Data</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Book Code</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->book_code }}</td>
                <td>{{ $item->title}}</td>
                <td>
                @foreach ($item->categories as $category)
                    {{ $category->name }}
                @endforeach    
                </td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                    <a href="/book-edit/{{$item->slug}}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                    <a href="/book-delete/{{ $item->slug }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

@endsection