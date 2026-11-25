<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Estimate;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $recentProjects = Project::latest()->take(3)->get();
        return view('home', compact('recentProjects'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::latest()->get();
        return view('services', compact('services'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('projects', compact('projects'));
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function quoteForm()
    {
        return view('quote');
    }

    public function storeQuote(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'nullable|email|max:255',
            'phone'            => 'required|string|max:255',
            'property_address' => 'required|string|max:255',
            'service_type'     => 'required|string|max:100',
            'roof_material'    => 'nullable|string|max:100',
            'project_details'  => 'nullable|string',
            'preferred_time'   => 'nullable|string|max:100',
        ]);

        Estimate::create($validated);

        return redirect()->back()->with('status', 'Your quote request has been submitted successfully! We will contact you within 24 hours.');
    }

    public function contact()
    {
        return view('contact');
    }
}