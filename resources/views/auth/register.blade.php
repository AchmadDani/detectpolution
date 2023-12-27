@extends('layouts.main')

@section('container')
        <div class="bg d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="p-5 rounded shadow-sm" style="width: 400px; background-color: #B4BFD4;">
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
@endsection