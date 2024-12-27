<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Review;
use App\Observers\ReviewObserver;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Review::observe(ReviewObserver::class);
    }
}