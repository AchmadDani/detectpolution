@extends('layouts.main')

@section('container')
        <div class="bg d-flex justify-content-center align-items-center">
            <div class="p-5 rounded shadow-sm w-40" style="background-color: #B4BFD4;">
                <div class="mb-3 text-center fs-3 fw-bold">
                    Forgot your password?
                </div>
                
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" required="">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
@endsection