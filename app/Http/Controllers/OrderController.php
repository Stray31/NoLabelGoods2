<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user() ?? \App\Models\User::first();
        $cart = $request->input('cart');
        if (is_string($cart)) {
            $cart = json_decode($cart, true);
        } // expects array: [['product_id'=>1,'quantity'=>2], ...]
        $address = $request->input('delivery_address');
        $contact = $request->input('contact_number');
        // Only process and remove checked out items
        $selected = $request->input('selected', []);
        if (is_string($selected)) {
            $selected = json_decode($selected, true);
        }
        $cart = is_array($cart) ? $cart : [];
        $checkedOut = [];
        $remainingCart = [];
        $total = 0;
        $items = [];
        foreach ($cart as $key => $item) {
            if (in_array($item['product_id'], $selected)) {
                $product = Product::findOrFail($item['product_id']);
                $subtotal = $product->price * $item['quantity'];
                $total += $subtotal;
                $items[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
                $checkedOut[] = $item['product_id'];
            } else {
                $remainingCart[$item['product_id']] = $item;
            }
        }
        if (empty($items)) {
            return redirect()->route('cart')->with('error', 'No items selected for checkout.');
        }
        $shipping = 40;
        // Check if user has enough balance (include shipping)
        if ($user->balance < ($total + $shipping)) {
            return redirect()->route('checkout')->with('error', 'Insufficient balance to complete this order.');
        }
        $user->balance -= ($total + $shipping);
        $user->save();
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'processing',
            'delivery_address' => $address,
            'contact_number' => $contact,
        ]);
        foreach ($items as $item) {
            $item['order_id'] = $order->id;
            OrderItem::create($item);
        }
        session(['cart' => $remainingCart]);
        return redirect()->route('profile')->with('success', 'Order placed successfully!');
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orderdetails', compact('order'));
    }
}
