<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'description'  => 'required|string',
            'before_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'after_image'  => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        // Before Image upload to public/uploads/projects
        $beforeName = time() . '_before.' . $request->file('before_image')->getClientOriginalExtension();
        $request->file('before_image')->move(public_path('uploads/projects'), $beforeName);

        // After Image upload to public/uploads/projects
        $afterName = time() . '_after.' . $request->file('after_image')->getClientOriginalExtension();
        $request->file('after_image')->move(public_path('uploads/projects'), $afterName);

        Project::create([
            'title'        => $request->title,
            'location'     => $request->location,
            'description'  => $request->description,
            'before_image' => 'uploads/projects/' . $beforeName,
            'after_image'  => 'uploads/projects/' . $afterName,
        ]);

        return redirect()->route('admin.projects.index')->with('status', 'Project added successfully!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Delete before image file from public folder
        if ($project->before_image && File::exists(public_path($project->before_image))) {
            File::delete(public_path($project->before_image));
        }
        
        // Delete after image file from public folder
        if ($project->after_image && File::exists(public_path($project->after_image))) {
            File::delete(public_path($project->after_image));
        }

        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('status', 'Project deleted successfully!');
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title'        => 'required|string|max:255',
            'location'     => 'required|string|max:255',
            'description'  => 'required|string',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'after_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = [
            'title'       => $request->title,
            'location'    => $request->location,
            'description' => $request->description,
        ];

        // If new Before Image is uploaded
        if ($request->hasFile('before_image')) {
            if ($project->before_image && File::exists(public_path($project->before_image))) {
                File::delete(public_path($project->before_image));
            }
            $beforeName = time() . '_before.' . $request->file('before_image')->getClientOriginalExtension();
            $request->file('before_image')->move(public_path('uploads/projects'), $beforeName);
            $data['before_image'] = 'uploads/projects/' . $beforeName;
        }

        // If new After Image is uploaded
        if ($request->hasFile('after_image')) {
            if ($project->after_image && File::exists(public_path($project->after_image))) {
                File::delete(public_path($project->after_image));
            }
            $afterName = time() . '_after.' . $request->file('after_image')->getClientOriginalExtension();
            $request->file('after_image')->move(public_path('uploads/projects'), $afterName);
            $data['after_image'] = 'uploads/projects/' . $afterName;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated successfully!');
    }
}