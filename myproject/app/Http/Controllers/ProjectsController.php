<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectsController extends Controller
{
    public function uploadProjects(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_az' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'description_az' => 'required|string',
        ]);

        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/project_images'), $imageName);
                $uploadedImages[] = $imageName;
            }
        }

        // Create the project
        $project = Project::create([
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'name_az' => $request->name_az,
            'description_en' => $request->description_en,
            'description_ru' => $request->description_ru,
            'description_az' => $request->description_az,
            'images' => $uploadedImages,
            'youtube_url' => $request->youtube_url,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.dashboard', ['section' => 'projects'])
            ->with('success', 'Project added successfully!');
    }
}
