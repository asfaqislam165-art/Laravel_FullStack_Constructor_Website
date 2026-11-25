<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_service.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/services'), $imageName);
            $imagePath = 'uploads/services/' . $imageName;
        }

        Service::create([
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'image'       => $imagePath,
            'features'    => $request->features ? explode(',', $request->features) : [],
        ]);

        return redirect()->route('admin.services.index')->with('status', 'Roofing Service Created!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = [
            'title'       => $request->title,
            'category'    => $request->category,
            'description' => $request->description,
            'features'    => $request->features ? explode(',', $request->features) : [],
        ];

        // If new image is uploaded, remove old and store new
        if ($request->hasFile('image')) {
            if ($service->image && File::exists(public_path($service->image))) {
                File::delete(public_path($service->image));
            }
            $imageName = time() . '_service.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/services'), $imageName);
            $data['image'] = 'uploads/services/' . $imageName;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('status', 'Roofing Service Updated!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Service Deleted!');
    }
}