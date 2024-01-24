@extends('layouts.MainLayout')

@section('title', 'dashboard')

@section('content')

<h1>Welcome, {{ Auth::user()->username }}</h1>

<div class="row mt-5">
    <div class="col-lg-4 ">
        <div class="card-data books">
            <div class="row">
            <div class="col-6"><i class="fa fa-book" aria-hidden="true"></i></div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <div class="card-count">{{ $book_count }}</div>
                <div class="card-desc"><small>Book</small></div>
            </div>    
            </div>    
        </div> 
    </div>

    <div class="col-lg-4 ">
        <div class="card-data category">
            <div class="row">
            <div class="col-6"><i class="fas fa-list" aria-hidden="true"></i></div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <div class="card-count">{{ $category_count }}</div>
                <div class="card-desc"><small>Categories</small></div>
            </div>    
            </div>    
        </div> 
    </div>

    <div class="col-lg-4 ">
        <div class="card-data users">
            <div class="row">
            <div class="col-6"><i class="fas fa-users" aria-hidden="true"></i></div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <div class="card-count">{{ $user_count }}</div>
                <div class="card-desc"><small>Users</small></div>
            </div>    
            </div>    
        </div> 
    </div>
    {{-- <div class="col-lg-4 ">
        <div class="card-data">Category</div> 
    </div>
    <div class="col-lg-4 ">
        <div class="card-data">User</div> 
    </div> --}}
</div>

<div class="mt-5">
    <h2>Rent Logs</h2>

    <table class="table">
        <thead>
            <tr>
                <th>No. </th>
                <th>User</th>
                <th>Book Titles</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" style="text-align: center">No. Data</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
