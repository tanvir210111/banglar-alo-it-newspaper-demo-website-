@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Edit Division</h4>

    <form action="{{ route('division.update', $division->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group mb-3">
            <label>Language</label>
            <select name="language_id" class="form-control">
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}" {{ $lang->id == $division->language_id ? 'selected' : '' }}>
                        {{ $lang->language }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Division Name</label>
            <input type="text" name="name" value="{{ $division->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
