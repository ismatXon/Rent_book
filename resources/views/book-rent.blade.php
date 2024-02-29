@extends('layouts.MainLayout')

@section('title', 'Book-Rent')

@section('content')

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">

        <h1 class="mb-3">Form Rent Book</h1>
        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="book-rent" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select id="user" name="user_id" class="form-control">
                    <option value=""></option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="book" class="form-label">Book</label>
                <select id="book" name="book_id" class="form-control">
                    <option value=""></option>
                    @foreach ($book as $item)
                        <option value="{{ $item->id }}">{{ $item->book_code }} - {{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
            </div>
            <div class="">
                <button class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>


    <!-- css untuk select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <!-- jika menggunakan bootstrap4 gunakan css ini  -->



    <script src="{{ asset('plugins/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $("#book").select2({
                placeholder: "Please Select"
            });
        });
        $(document).ready(function() {
            $("#user").select2({
                placeholder: "Please Select"
            });
        });
    </script>
@endsection
