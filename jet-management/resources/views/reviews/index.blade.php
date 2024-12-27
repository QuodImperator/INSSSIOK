@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reviews</h1>

    <form action="{{ route('reviews.index') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="status">Filter by Status:</label>
            <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Declined</option>
            </select>
        </div>
    </form>

    @foreach($reviews as $review)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Review for {{ $review->jet->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">By {{ $review->reviewer_name }}</h6>
            <p class="card-text">Rating: {{ $review->rating }}/5</p>
            <p class="card-text">{{ $review->text }}</p>
            <p class="card-text">
                <small class="text-muted">Status: {{ ucfirst($review->status) }}</small>
            </p>

            @if($review->status === 'pending')
            <form action="{{ route('reviews.update-status', $review) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <button type="submit" name="status" value="approved" class="btn btn-success">Approve</button>
                <button type="submit" name="status" value="declined" class="btn btn-danger">Decline</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach

    {{ $reviews->links() }}
</div>
@endsection