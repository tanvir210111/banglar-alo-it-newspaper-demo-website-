@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Add New Upazila</h4>

    <form action="{{ route('upazila.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Language</label>
            <select name="language_id" class="form-control">
                <option value="">Select Language</option>
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->language }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>District</label>
            <select name="district_id" class="form-control">
                <option value="">Select District</option>
                @foreach($districts as $dist)
                    <option value="{{ $dist->id }}">{{ $dist->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Upazila Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
