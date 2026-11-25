<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    // Frontend-e reviews list show korar jonno (Public)
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews', compact('reviews'));
    }

    // Frontend theke review store ba submit korar jonno
    public function store(Request $request)
    {
        $request->validate([
            'client_name'  => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
            'review_text'  => 'required|string',
            'service_type' => 'nullable|string|max:255',
        ]);

        Review::create([
            'client_name'  => $request->client_name,
            'location'     => $request->location,
            'rating'       => $request->rating,
            'review_text'  => $request->review_text,
            'service_type' => $request->service_type ?? 'Roofing Service',
        ]);

        return redirect()->back()->with('status', 'Thank you! Your review has been submitted successfully.');
    }

    // Admin Panel-e reviews manage korar jonno
    public function adminIndex()
    {
        $reviews = Review::latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    // Admin panel theke review create form dekhanor jonno
    public function create()
    {
        return view('admin.reviews.create');
    }

    // Admin panel theke review store ba save korar jonno
    public function adminStore(Request $request)
    {
        $request->validate([
            'client_name'  => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
            'review_text'  => 'required|string',
            'service_type' => 'nullable|string|max:255',
        ]);

        Review::create([
            'client_name'  => $request->client_name,
            'location'     => $request->location,
            'rating'       => $request->rating,
            'review_text'  => $request->review_text,
            'service_type' => $request->service_type ?? 'Roofing Service',
        ]);

        return redirect()->route('admin.reviews.index')->with('status', 'Review added successfully!');
    }

    // Admin panel theke review edit form dekhanor jonno
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    // Admin panel theke review update korar jonno
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $request->validate([
            'client_name'  => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
            'review_text'  => 'required|string',
            'service_type' => 'nullable|string|max:255',
        ]);

        $review->update([
            'client_name'  => $request->client_name,
            'location'     => $request->location,
            'rating'       => $request->rating,
            'review_text'  => $request->review_text,
            'service_type' => $request->service_type ?? $review->service_type ?? 'Roofing Service',
        ]);

        return redirect()->route('admin.reviews.index')->with('status', 'Review updated successfully!');
    }

    // Admin panel theke review delete korar jonno
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('status', 'Review deleted successfully!');
    }
}