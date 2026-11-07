@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>All Divisions</h4>
    <a href="{{ route('division.create') }}" class="btn btn-primary mb-3">+ Add New Division</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Language</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisions as $key => $division)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $division->language->language ?? 'N/A' }}</td>
                <td>{{ $division->name }}</td>
                <td>{{ $division->slug }}</td>
                <td>
                    <form action="{{ route('division.destroy', $division->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this division?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
