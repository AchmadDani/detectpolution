@extends('layouts.main')

@section('container')
    <!-- Content -->
    <div class="bg" style="height: 100vh">
        <div class="content">
            <div class="text">
                <h1>Cek Kualitas Udara Anda</h1>
            </div>
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                    <form class="d-flex" action="{{ route('user.index') }}" method="post">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="Masukan nama daerah" aria-label="Search" name="cityName">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
@endsection
