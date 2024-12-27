@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jets</h1>
    
    <div class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search jets..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ route('jets.create') }}" class="btn btn-success">Add New Jet</a>
    </div>

    @foreach($jets as $jet)
    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $jet->name }}</h3>
            <p>Model: {{ $jet->model }}</p>
            <p>Capacity: {{ $jet->capacity }}</p>
            <p>Rate: ${{ $jet->hourly_rate }}/hour</p>
            
            <div style="display: flex; gap: 5px">
                <a href="{{ route('jets.show', $jet) }}" class="btn btn-primary" style="width: auto">View</a>
                <a href="{{ route('jets.edit', $jet) }}" class="btn btn-warning" style="width: auto">Edit</a>
                <form action="{{ route('jets.destroy', $jet) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="width: auto" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    {{ $jets->links() }}
</div>
@endsection