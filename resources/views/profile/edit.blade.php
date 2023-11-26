@extends('layouts.main')

@section('container')
    <div class="bg d-flex justify-content-start align-items-center p-5">
        <div class="mt-5 mb-5 p-5 rounded shadow-sm" style="width: 40rem; background-color: #B4BFD4;">
            <div class="mb-3">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-form')
                </div>
            </div>

            <div class="mb-3">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>    
@endsection


