<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')->get();

        return view('admin.dashboard.categories', compact('categories'));
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
        $category = Category::findOrFail($id);
        return view('admin.dashboard.edit_category', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_az' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }


    public function reorder(Request $request)
    {
        // handle manual ordering (e.g., via drag-and-drop)
    }
}
