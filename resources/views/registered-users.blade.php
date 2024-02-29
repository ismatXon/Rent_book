@extends('layouts.MainLayout')



@section('title','Users')

@section('content')
 
<h1>New Registered User List</h1>

<div class="my-5 d-flex justify-content-end">
    <a href="/registered-users" class="btn btn-secondary me-3"><i class="fa fa-ban" aria-hidden="true"></i> View Banned User</a>
    <a href="/users" class="btn btn-success">Approved Users List</a>
</div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($registeredUsers as $item)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>
                    @if ($item->phone)
                        {{ $item->phone }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="/user-detail/{{ $item->slug }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-info-circle"
                        aria-hidden="true"></i></a>
                </td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection