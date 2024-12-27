<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::when($request->status, function ($query, $status) {
            return $query->where('status', $status);
        })->with('jet')->paginate(10);

        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jet_id' => 'required|exists:jets,id',
            'reviewer_name' => 'required|string',
            'text' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create($validated);
        return back()->with('success', 'Review submitted successfully');
    }

    public function updateStatus(Review $review, Request $request)
    {
        $request->validate([
            'status' => 'required|in:approved,declined'
        ]);
    
        $review->update(['status' => $request->status]);
        
        return back()->with('success', 'Review status updated successfully');
    }
}