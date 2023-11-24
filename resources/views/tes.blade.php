@extends('layouts.tes')

@section('container')
<div class="bg">
    <div class="d-flex justify-content-end h-100">
        <div class="w-50 p-5 rounded shadow-sm" style="background-color: #ffffff;">
            <div class="mb-3 mt-5 text-center" style="font-weight: bold; font-size: 2em;">
                Login to Your account
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="mb-3 px-5 mx-5">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-control form-control-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mb-3 px-5 mx-5">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-control form-control-sm" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <div class="d-flex justify-content-between mx-5 px-5">
                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                </div>

                <!-- Forget PW -->
                <div class="mb-3 form-check">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    @endif
                </div>
            </div>
                <div class="d-grid gap-2 px-5 mx-5 mt-5">
                    <button class="btn btn-primary btn-sm fw-bold" type="submit" style="background: #C90022">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
