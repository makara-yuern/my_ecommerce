<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function showByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $products = Product::where('category_id', $categoryId)->get();

        return view('products.index', compact('products', 'category'));
    }
}
