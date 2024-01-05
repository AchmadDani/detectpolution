@extends('layouts.main')

@section('container')

<!-- Add this section to display error message -->
<!-- Add this section to display success message -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Add this section to display error message -->
@if($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif


<div class="d-flex justify-content-center align-items-center">
    <div class="mt-5 p-5 rounded shadow-sm mb-4" style="width: 800px; background-color: #B4BFD4;">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 text-center">
                <img src="img/QR.jpeg" alt="Upload Image" width="20%">
            </div>
            <div class="mb-3">
                <div class="text-center">
                    Silahkan transfer sebesar Rp{{ number_format(rand(2000, 2500)) }}
                    <br>ke nomor rekening berikut
                    <br>798798798869 a.n Achmad Dani Saputra
                    <br>798798798869 a.n Achmad Dani Saputra
                    <br>798798798869 a.n Achmad Dani Saputra
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Bukti Tf</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection
