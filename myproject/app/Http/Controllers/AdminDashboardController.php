<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index($section = null)
    {
        $clients = Client::all();
        $projects = ($section === 'projects') ? Project::with('category')->get() : collect();
        $categories = Category::all(); // Fetch categories for the dropdown

        return view('admin.dashboard', compact('section', 'clients', 'projects', 'categories'));
    }
}
