@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>All Districts</h4>
    <a href="{{ route('district.create') }}" class="btn btn-primary mb-3">+ Add New District</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Language</th>
                <th>Division</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($districts as $key => $district)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $district->language->language ?? 'N/A' }}</td>
                <td>{{ $district->division->name ?? 'N/A' }}</td>
                <td>{{ $district->name }}</td>
                <td>{{ $district->slug }}</td>
                <td>
                    <form action="{{ route('district.destroy', $district->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this district?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
