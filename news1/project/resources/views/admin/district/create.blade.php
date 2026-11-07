@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Add New District</h4>

    <form action="{{ route('district.store') }}" method="POST">
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
            <label>Division</label>
            <select name="division_id" class="form-control">
                <option value="">Select Division</option>
                @foreach($divisions as $div)
                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>District Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
