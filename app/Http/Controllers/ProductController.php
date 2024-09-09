<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // Logic for the shop page
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
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Return the product view with the product data
        return view('products.show', compact('product'));
    }
}
