@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center align-items-center">
    <div class="mt-5 p-5 rounded shadow-sm" style="width: 800px; background-color: #B4BFD4;">
        <form action="{{ route('uploads') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 text-center">
                <img src="img/QR.jpeg" alt="Upload Image" width="20%">
            </div>
            <div class="mb-3">
                <div class="text-center">
                    Silahkan transfer sebesar Rp5.113
                    <br>ke nomoer rekening berikut
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