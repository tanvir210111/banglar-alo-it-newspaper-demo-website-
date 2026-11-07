@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>All Upazilas</h4>
    <a href="{{ route('upazila.create') }}" class="btn btn-primary mb-3">+ Add New Upazila</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Language</th>
                <th>District</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($upazilas as $key => $upazila)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $upazila->language->language ?? 'N/A' }}</td>
                <td>{{ $upazila->district->name ?? 'N/A' }}</td>
                <td>{{ $upazila->name }}</td>
                <td>{{ $upazila->slug }}</td>
                <td>
                    <form action="{{ route('upazila.destroy', $upazila->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this upazila?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
