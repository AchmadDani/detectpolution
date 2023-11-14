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
                    Login
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control form-control-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
        
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control form-control-sm" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
        
                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>
        
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">{{ __('Log in') }}</button>
                    </div>
        
                    <div class="mt-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
</div>
    

    <!-- footer -->
    <footer class="text-center py-2" style="background-color: #2FB69F;">
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