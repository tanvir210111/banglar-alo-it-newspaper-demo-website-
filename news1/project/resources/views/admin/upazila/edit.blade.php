@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Edit Upazila</h4>

    <form action="{{ route('upazila.update', $upazila->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group mb-3">
            <label>Language</label>
            <select name="language_id" class="form-control">
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}" {{ $lang->id == $upazila->language_id ? 'selected' : '' }}>
                        {{ $lang->language }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>District</label>
            <select name="district_id" class="form-control">
                @foreach($districts as $dist)
                    <option value="{{ $dist->id }}" {{ $dist->id == $upazila->district_id ? 'selected' : '' }}>
                        {{ $dist->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Upazila Name</label>
            <input type="text" name="name" value="{{ $upazila->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
