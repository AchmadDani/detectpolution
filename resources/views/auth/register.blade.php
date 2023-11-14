<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/assets/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-light" style="background-color: #2FB69F;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/Logo.png') }}" alt="" width="50" height="50">
            </a>
            <div class="d-flex">
                @auth
                    <a class="nav-link" href="{{ url('/dashboard') }}" style="color: white;">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="color: white;">Logout</a>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">Login</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}" style="color: white;">Register</a>
                    @endif
                @endauth
            </div>           
        </div>
    </nav>
    <!-- End Header -->

<div class="bg">
        <div class="d-flex justify-content-center align-items-center">
            <div class="mt-5 p-5 rounded shadow-sm" style="width: 400px; background-color: #B4BFD4;">
                <div class="mb-3 text-center" style="font-weight: bold; font-size: 1.2em;">
                    Register
                </div>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
            
                    <div class="d-flex justify-content-end">
                        <div class="text">Already register?</div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    
                </form>
                
            </div>
        </div>
</div>
    

    <!-- footer -->
    <footer class="text-center py-3" style="background-color: #2FB69F;">
        <div class="container">
          <span style="color: white;">copyright@2023</span>
        </div>
    </footer>
    <!-- End Footer-->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>