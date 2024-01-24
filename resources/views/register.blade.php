<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Books | Register </title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        .main{ 
            height: 100vh;
        }
        .register-box{
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }
    form div {
        margin-bottom: 15px;
    }
    </style>
</head>
<body>
    
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if ($errors->any())
        <div class="alert alert-danger" style="width: 500px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
        <div class="register-box">
            
            <form action="register" method="post">
                @csrf
                <div>    
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div>    
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>
                </div>
                <div>    
                    <label for="address" class="form-label">Address</label>
                 <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
                <div>
                    <input type="submit" value="Register" class="btn btn-primary form-control">
                </div>
                <div class="text-center">
                    Have account?<a href="login">Login</a>
                </div>
            </form>
    </div>
</div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>