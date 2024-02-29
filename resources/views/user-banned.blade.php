@extends('layouts.MainLayout')

@section('title', 'Banned Users')
@section('content')

    <h1>Banned Users List</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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
                @foreach ($bannedUser as $item)
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
                            <a href="/user-restore/{{ $item->slug }}" class="btn btn-sm btn-outline-success"><i class="fas fa-trash-restore"></i></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
