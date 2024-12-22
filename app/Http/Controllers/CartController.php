<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    try {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $cart[$validated['id']] = $validated;
        session()->put('cart', $cart);

        return response()->json(['success' => true], 200);
    } catch (\Exception $e) {
        \Log::error($e->getMessage());

        return response()->json(['success' => false, 'message' => 'Failed to add item to cart.'], 500);
    }
}

    public function viewCart()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('other-page.cart', compact('cart', 'total'));
    }

    public function updateQuantity(Request $request)
    {
        $cart = session('cart', []);
        $itemId = $request->id;
        $newQuantity = $request->quantity;

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'cart' => $cart]);
        }
    
        return response()->json(['success' => false]);
    }

    public function removeItem(Request $request)
    {
        $cart = session()->get('cart', []);
        $itemId = $request->id;

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'cart' => $cart]);
        }

        return response()->json(['success' => false]);
    }
}
