<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Books | Login </title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    
    
</head>
<style>
    .main{
        height: 100vh;
        box-sizing: border-box;
    }
    .login-box{
        width: 500px;
        padding: 30px;
    }
    form div {
        margin-bottom: 15px;
    }
</style>
<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        {{-- @if (session('status'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif --}}

        @if (session('status'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
                {{ session('message') }}
            </div>
          </div>
        @endif
        <div class="login-box  shadow shadow-lg p-3 mb-5 bg-body rounded">
            <form action="" method="post">
                @csrf
                {{--  --}}

                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Username</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>

                {{--  --}}
                {{-- <div>
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required id="">
                </div>
                <div>
                    <label for="" class="form-class">Password</label>
                    <input type="password" name="password" class="form-control" required id="">
                </div> --}}
                <div>
                    <input type="submit" value="Login" class="btn btn-primary form-control">
                </div>
                <div class="text-center">
                    Don't have account? <a href="register">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>