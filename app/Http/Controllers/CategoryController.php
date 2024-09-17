<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        // Get all categories with pagination (12 per page)
        $categories = Category::orderBy('id', 'asc')->paginate(12);

        return view('categories.all', compact('categories'));
    }
}
