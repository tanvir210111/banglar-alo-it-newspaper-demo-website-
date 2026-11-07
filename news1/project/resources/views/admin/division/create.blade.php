@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Add New Division</h4>

    <form action="{{ route('division.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Language</label>
            <select name="language_id" class="form-control">
                <option value="">Select Language</option>
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->language }}</option>
                @endforeach
            </select>
            @error('language_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group mb-3">
            <label>Division Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter division name">
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
