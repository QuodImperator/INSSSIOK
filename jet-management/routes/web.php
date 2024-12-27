<?php

use App\Http\Controllers\JetController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('jets.index');
});

Route::resource('jets', JetController::class);
Route::resource('reviews', ReviewController::class)->only(['index', 'store', 'show']);
Route::patch('reviews/{review}/status', [ReviewController::class, 'updateStatus'])->name('reviews.update-status');