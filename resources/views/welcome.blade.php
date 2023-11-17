@extends('layouts.main')

@section('container')
    <!-- Content -->
        <div class="bg">
            <div class="content">
                <div class="text">
                    <h1>Cek Kualitas Udara anda</h1>
                </div>
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Masukan nama daerah" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
@endsection