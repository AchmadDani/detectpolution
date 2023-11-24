    @extends('layouts.main')

    @section('container')
            <div class="bg d-flex justify-content-center align-items-center">
                <div class="p-5 rounded shadow-sm" style="width: 400px; background-color: #B4BFD4;">
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
    @endsection