@extends('layouts.main')

@section('container')
    <div class="bg" style="background-color: #B4BFD4;">
        <h1>Admin Page</h1>
        <table class="table" style="background-color: #B4BFD4;">
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
                        <td><img src="{{ $upload->image }}" alt="Uploaded Image" width="100"></td>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
