@extends('layouts.MainLayout')

@section('title', 'User Detail')

@section('content')

    <a href="/users"><i class="fas fa-arrow-left"></i></a>

    <h1>Detail User </h1>


    @if ($user->status == 'inactive')
        <div class="my-2 d-flex justify-content-end">
            <a href="/user-approve/{{ $user->slug }}" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i>
                Approve</a>
        </div>
    @else
        <div class="my-2 d-flex justify-content-end">
            <a href="/user-unapprove/{{ $user->slug }}" class="btn btn-danger">Unapprove</a>
        </div>
    @endif

    <div class="mt-2">
        @if (session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check"></i> {{ session('status') }}
            </div>
        @endif
    </div>


    <div class="row mt-3">
        <div class="col-4">
            <div class="">
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="" class="form-control" readonly value="{{ $user->username }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                    <input type="text" name="" class="form-control" readonly value="{{ $user->phone }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <textarea name="" id="" cols="20" rows="10" class="form-control" style="resize:none">{{ $user->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <input type="text" name="" class="form-control" readonly value="{{ $user->status }}">
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="">
                <x-rent-logs-table :rentlog=$rentlogs />
            </div>

        </div>
    </div>


@endsection
