<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch featured products from the database
        $featuredProducts = Product::paginate(20);

        // Pass the products to the view
        return view('home', compact('featuredProducts'));
    }

    /**
     * Load more products.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadMore(Request $request)
    {
        // Fetch paginated products based on the requested page
        $products = Product::paginate(20, ['*'], 'page', $request->page);

        return response()->json($products);
    }
}
