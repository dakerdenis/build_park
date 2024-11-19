<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function uploadProjects(Request $request)
    {
        // Validate the request
        $request->validate([
            'project__name__en' => 'required|string|max:255',
            'project__name__ru' => 'required|string|max:255',
            'project__desc__en' => 'required|string',
            'project__desc__ru' => 'required|string',
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'project__video' => 'nullable|url',
        ]);

        $uploadedImages = [];

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/project_images'), $imageName);
                $uploadedImages[] = $imageName;
            }
        }

        // Create the project record
        $project = Project::create([
            'name_en' => $request->input('project__name__en'),
            'name_ru' => $request->input('project__name__ru'),
            'description_en' => $request->input('project__desc__en'),
            'description_ru' => $request->input('project__desc__ru'),
            'images' => $uploadedImages,
            'youtube_link' => $request->input('project__video'),
        ]);

        // Redirect back to the admin panel with the project section
        return redirect()->route('admin.dashboard', ['section' => 'all_projects'])->with('success', 'Project added successfully!');
    }
}
