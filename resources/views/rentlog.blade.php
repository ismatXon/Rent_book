@extends('layouts.MainLayout')



@section('page-name', 'dashboard')
@section('title', 'Rent Logs')
@section('content')

<div class="row">
    <div class="col-4">
        <h2>Return Book</h2>
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col">
                <input type="text" name="" class="form-control" id="">
            </div>
            <div class="col">
                <input type="text" name="" class="form-control" id="">
            </div>
        </div>
    </div>
  
</div>
    <div class="mt-5">
        <h2>Rent Logs list</h2>
        <x-rent-logs-table :rentlog=$rentlogs/>
    </div> 

@endsection
