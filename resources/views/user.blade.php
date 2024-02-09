@extends('layouts.MainLayout')

@section('title', 'Users')
@section('content')



    <h1>User List</h1>


    <div class="my-5 d-flex justify-content-end">
        <a href="/user-banned" class="btn btn-secondary me-3"><i class="fa fa-ban" aria-hidden="true"></i> View Banned
            User</a>
        <a href="/registered-users" class="btn btn-success"><i class="far fa-plus-square"></i> New Registered User</a>
    </div>

    @if (session('status'))
        <div class="my-5">
            <div class="alert alert-success">
                <i class="fas fa-check"></i> {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
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

                            @if ($item->status == 'active')
                                <span class="badge text-bg-success">{{ $item->status }}</span>
                            @else
                                <span class="badge text-bg-danger">{{ $item->status }}</span>
                            @endif

                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-info-circle" aria-hidden="true"></i></a>
                            <a href="/user-ban/{{ $item->slug }}" class="btn btn-sm btn-outline-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
