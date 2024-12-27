@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jet</h1>
    
    <form action="{{ route('jets.update', $jet) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $jet->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $jet->model) }}" required>
            @error('model')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $jet->capacity) }}" required min="1">
            @error('capacity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hourly_rate" class="form-label">Hourly Rate</label>
            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" value="{{ old('hourly_rate', $jet->hourly_rate) }}" required min="0" step="0.01">
            @error('hourly_rate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Jet</button>
    </form>
</div>
@endsection