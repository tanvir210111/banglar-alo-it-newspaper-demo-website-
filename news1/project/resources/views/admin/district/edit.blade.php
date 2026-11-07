@extends('layouts.admin') 
@section('content')

<div class="container mt-4">
    <h4>Edit District</h4>

    <form action="{{ route('district.update', $district->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group mb-3">
            <label>Language</label>
            <select name="language_id" class="form-control">
                @foreach($languages as $lang)
                    <option value="{{ $lang->id }}" {{ $lang->id == $district->language_id ? 'selected' : '' }}>
                        {{ $lang->language }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Division</label>
            <select name="division_id" class="form-control">
                @foreach($divisions as $div)
                    <option value="{{ $div->id }}" {{ $div->id == $district->division_id ? 'selected' : '' }}>
                        {{ $div->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>District Name</label>
            <input type="text" name="name" value="{{ $district->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
