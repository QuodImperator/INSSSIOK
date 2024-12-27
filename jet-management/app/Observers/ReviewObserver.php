<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    public function creating(Review $review)
    {
        $review->status = 'pending';
    }
}