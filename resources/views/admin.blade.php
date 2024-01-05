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