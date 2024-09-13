<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $items = $cart ? $cart->items()->with('product')->get() : collect();
        return view('cart.index', compact('items'));
    }

    public function add(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->input('quantity');
        $user = Auth::user();

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        }

        return response()->json(['message' => 'Product added to cart']);
    }

    public function remove($id)
    {
        try {
            $cartItem = CartItem::findOrFail($id);
            $cartItem->delete();
            return redirect()->route('cart.index');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Unable to remove item from cart.');
        }
    }
}
