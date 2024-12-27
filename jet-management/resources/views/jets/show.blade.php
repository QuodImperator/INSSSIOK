@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $jet->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jet Details</h5>
            <p class="card-text"><strong>Model:</strong> {{ $jet->model }}</p>
            <p class="card-text"><strong>Capacity:</strong> {{ $jet->capacity }}</p>
            <p class="card-text"><strong>Hourly Rate:</strong> ${{ number_format($jet->hourly_rate, 2) }}</p>
        </div>
    </div>

    <h2 class="mt-4">Reviews</h2>

    <form action="{{ route('reviews.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="hidden" name="jet_id" value="{{ $jet->id }}">

        <div class="mb-3">
            <label for="reviewer_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="reviewer_name" name="reviewer_name" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-control" id="rating" name="rating" required>
                <option value="">Select Rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Review Text</label>
            <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>

    @foreach($jet->reviews()->where('status', 'approved')->get() as $review)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $review->reviewer_name }}</h5>
            <p class="card-text">Rating: {{ $review->rating }}/5</p>
            <p class="card-text">{{ $review->text }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection