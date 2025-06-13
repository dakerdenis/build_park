<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')->orderBy('order')->get();


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
    
        $maxOrder = Category::max('order') ?? 0;
        $validated['order'] = $maxOrder + 1;
    
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
        $order = $request->input('order'); // array of IDs
    
        foreach ($order as $index => $id) {
            Category::where('id', $id)->update(['order' => $index]);
        }
    
        return response()->json(['success' => true]);
    }
    
}
