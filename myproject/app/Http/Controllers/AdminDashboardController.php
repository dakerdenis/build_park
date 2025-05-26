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

    public function projects()
    {
        $projects = Project::with('category')->get();
        return view('admin.dashboard.projects', compact('projects'));
    }

    public function addProject()
    {
        $categories = Category::all();
        return view('admin.dashboard.add_project', compact('categories'));
    }
}
