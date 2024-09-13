<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $featuredProducts = Product::paginate(20);
        $categories = Category::orderBy('id', 'asc')->limit(3)->get();
        $newArrivals = Product::orderBy('id', 'desc')->limit(8)->get();

        return view('home', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'newArrivals' => $newArrivals
        ]);
    }

    /**
     * Load more products.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadMore(Request $request)
    {
        $products = Product::paginate(20, ['*'], 'page', $request->page);

        return response()->json($products);
    }
}
