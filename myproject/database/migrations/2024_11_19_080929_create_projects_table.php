<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'project__name__en' => 'required|string|max:255',
            'project__name__ru' => 'required|string|max:255',
            'project__name__az' => 'required|string|max:255',
            'project__desc__en' => 'required|string',
            'project__desc__ru' => 'required|string',
            'project__desc__az' => 'required|string',
            'category_id'       => 'required|exists:categories,id',
            'project__video'    => 'nullable|url',
            'main_image'        => 'required|image|max:2048',
            'images.*'          => 'nullable|image|max:2048'
        ]);

        // Save main image
        $mainImage = $request->file('main_image');
        $mainImageName = time() . '_main_' . Str::random(10) . '.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('uploads/project_images'), $mainImageName);

        // Save additional images (optional)
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . Str::random(10) . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('uploads/project_images'), $imgName);
                $imageNames[] = $imgName;
            }
        }

        Project::create([
            'name_en'        => $request->input('project__name__en'),
            'name_ru'        => $request->input('project__name__ru'),
            'name_az'        => $request->input('project__name__az'),

            'description_en' => $request->input('project__desc__en'),
            'description_ru' => $request->input('project__desc__ru'),
            'description_az' => $request->input('project__desc__az'),

            'category_id'    => $request->input('category_id'),
            'youtube_url'    => $request->input('project__video'),
            'address'        => $request->input('address'), // optional, if added in form

            'main_image'     => $mainImageName,
            'images'         => $imageNames,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully.');
    }
}
