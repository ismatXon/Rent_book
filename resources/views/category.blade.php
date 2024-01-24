@extends('layouts.MainLayout')

@section('page-name','dashboard')

@section('title','Category')

@section('content')
    
<h2>Category List</h2>
<div class="mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            <i class="fas fa-check"></i> {{ session('status') }}
        </div>  
    @endif
</div>
<div class="mt-5 d-flex justify-content-end">
    <a href="category-add" class="btn btn-success"><i class="far fa-plus-square"></i> Add Data</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <a href="category-edit/{{$item->slug}}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                <a href="category-delete/{{ $item->slug }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection