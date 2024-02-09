@extends('layouts.MainLayout')

@section('title','Profile')

@section('content')
    <h1>ini halaman profile</h1>

    <div class="mt-5">
        <h2>Rent Logs list</h2>
        <x-rent-logs-table :rentlog=$rentlogs/>
    </div> 

@endsection