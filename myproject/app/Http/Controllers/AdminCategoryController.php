<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.categories');
    }


    public function create()
    {
        return view('admin.dashboard.create_category');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ru' => 'required|string|max:255',
        'name_az' => 'required|string|max:255',
    ]);

    Category::create($validated);

    return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
}


    public function edit($id)
    {
        // return view to edit category
    }

    public function update(Request $request, $id)
    {
        // handle update logic
    }

    public function destroy($id)
    {
        // delete category
    }

    public function reorder(Request $request)
    {
        // handle manual ordering (e.g., via drag-and-drop)
    }
}
