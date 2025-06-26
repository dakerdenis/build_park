<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class AllProjectsController extends Controller
{
    public function index(Request $request, $lang)
    {
        $selectedCategory = $request->query('category'); // исправлено
    
        $projectsQuery = Project::query()->with('category');
    
        if ($selectedCategory) {
            $projectsQuery->where('category_id', $selectedCategory);
        }
    
        $projects = $projectsQuery->get();
        $categories = Category::orderBy('order')->get();
    
        return view('projects', compact('projects', 'categories', 'selectedCategory'));
    }
    public function show($lang, $id)
{
    $project = Project::findOrFail($id);
    $categories = Category::orderBy('order')->get();

    return view('single_project', compact('project', 'categories'));
}
public function getProjectsByCategory(Request $request)
{
    $categoryId = $request->query('category_id');

    $projects = \App\Models\Project::where('category_id', $categoryId)
                ->take(4)
                ->get();

    return response()->json($projects);
}


}
