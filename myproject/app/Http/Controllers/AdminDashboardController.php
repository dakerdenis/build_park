<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function home()
    {
        return view('admin.dashboard.home');
    }

    public function clients()
    {
        $clients = Client::all();
        return view('admin.dashboard.clients', compact('clients'));
    }

    public function addClient()
    {
        return view('admin.dashboard.add_client');
    }

    public function projects(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category_id');
    
        $projectsQuery = Project::with('category');
    
        if ($selectedCategory) {
            $projectsQuery->where('category_id', $selectedCategory);
        }
    
        $projects = $projectsQuery->get();
    
        return view('admin.dashboard.projects', compact('projects', 'categories', 'selectedCategory'));
    }
    

    public function addProject()
    {
        $categories = Category::all();
        return view('admin.dashboard.add_project', compact('categories'));
    }
}
