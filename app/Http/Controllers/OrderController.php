<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $cart->items->sum(function ($item) {
                return $item->product->price * $item->quantity;
            }),
            'status' => 'pending',
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        $cart->items()->delete();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order successfully placed!');
    }


    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($request->payment_method == 'stripe') {
            return redirect()->route('orders.show', $order->id)->with('success', 'Payment successful with Stripe!');
        } elseif ($request->payment_method == 'paypal') {
            return redirect()->route('orders.show', $order->id)->with('success', 'Payment successful with PayPal!');
        }

        return redirect()->route('orders.show', $order->id)->with('error', 'Payment method not recognized.');
    }
}
