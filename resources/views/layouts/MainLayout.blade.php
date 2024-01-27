<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Book | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-4.1.0-rc.0/dist/css/select2.min.css') }}">

</head>

<body>
    <div class="main d-flex flex-column justify-content-between ">
        <nav class="navbar navbar-dark navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rent Book</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block " id="navbarSupportedContent">

                    @if (Auth::user()->role_id == 1)
                        <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class='active' @endif> Dashboard</a>
                        <a href="/books" @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' ) class='active' @endif>Books</a>
                        <a href="/categories" @if (request()->route()->uri == 'categories') class='active' @endif>Categories</a>
                        <a href="/users" @if (request()->route()->uri == 'users') class='active' @endif>Users</a>
                        <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class='active' @endif>Rent Logs</a>
                        <a href="/logout">Logout</a>
                    @else
                        <a href="/profile" @if (request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                        <a href="/logout">Logout</a>
                    @endif


                </div>
                <div class="content p-5 col-lg-10 ">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>



    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
 
</body>

</html>
