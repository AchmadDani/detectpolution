{{-- <html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Transaksi</title>
    <!-- Tambahkan link CSS DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Koleksi') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-grey dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white-900 dark:text-gray-100">
                        <table id="uploadsTable" class="table" style="background-color: #B4BFD4;">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#uploadsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('getKoleksi') !!}',
            columns: [
                {data: 'image', name: 'image'},
                {data: 'user', name: 'user'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

</body>
</html> --}}

@extends('layouts.main')

@section('container')
    <div class="bg" style="background-color: #B4BFD4;">
        <div class="text fs-2 fw-bold">
            Admin Page
        </div>
        <table class="table mt-4" style="background-color: #B4BFD4;">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uploads as $upload)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $upload->image) }}" alt="Uploaded Image" width="100">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal{{ $upload->id }}">
                                View Image
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="imageModal{{ $upload->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/' . $upload->image) }}" alt="Uploaded Image" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($upload->user)
                                {{ $upload->user->name }}
                            @else
                                User not available
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.approve', $upload->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('admin.reject', $upload->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


{{-- @extends('layouts.main')

@section('container')
<table id="uploadsTable" class="table" style="background-color: #B4BFD4;">
    <thead>
        <tr>
            <th>Image</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
<script>
    $(document).ready(function () {
        $('#uploadsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('getKoleksi') !!}',
            columns: [
                {data: 'image', name: 'image'},
                {data: 'user', name: 'user'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection --}}