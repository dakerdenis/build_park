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
        // return view with form to add new category
    }

    public function store(Request $request)
    {
        // handle creation logic
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
