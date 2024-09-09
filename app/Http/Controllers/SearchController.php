<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Show the search results.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(20);

        return view('components.search-results', compact('products', 'query'));
    }

    public function suggestions(Request $request)
    {
        // Get the search query
        $query = $request->input('query');

        // Fetch products that match the search query (limit to 5 for suggestions)
        $suggestions = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit(5)
            ->get(['id', 'name', 'image']);

        // Return suggestions as JSON
        return response()->json($suggestions);
    }
}
