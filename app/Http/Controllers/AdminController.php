<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalEstimates   = Estimate::count();
        $pendingEstimates = Estimate::where('status', 'Pending')->count();
        $totalProjects    = Project::count();
        $totalReviews     = Review::count();
        $recentEstimates  = Estimate::latest()->take(5)->get();

        // Last 6 months-er estimate count (line chart-er jonno)
        $counts = Estimate::where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->get()
            ->groupBy(fn ($estimate) => $estimate->created_at->format('Y-m'))
            ->map->count();

        $chartLabels = [];
        $chartValues = [];

        for ($i = 5; $i >= 0; $i--) {
            $month         = now()->startOfMonth()->subMonths($i);
            $chartLabels[] = $month->format('M Y');
            $chartValues[] = $counts[$month->format('Y-m')] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalEstimates',
            'pendingEstimates',
            'totalProjects',
            'totalReviews',
            'recentEstimates',
            'chartLabels',
            'chartValues'
        ));
    }

    public function estimates()
    {
        $estimates = Estimate::latest()->get();
        return view('admin.estimates', compact('estimates'));
    }

    public function updateEstimateStatus(Request $request, $id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->status = $request->status;
        $estimate->save();

        return redirect()->back()->with('status', 'Estimate status updated successfully!');
    }

    public function reviews()
    {
        $reviews = Review::latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroyReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('status', 'Review deleted successfully!');
    }

    public function destroyEstimate($id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->delete();

        return redirect()->back()->with('status', 'Estimate request deleted successfully!');
    }
}