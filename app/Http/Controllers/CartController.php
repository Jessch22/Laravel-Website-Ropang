<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $menu = Menu::find($id);

        if(!$menu) {
            return response()->json(['error' => 'Menu item not found'], 404);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $menu->name,
                'description' => $menu->description,
                'price' => $menu->price,
                'quantity' => 1,
                'image' => $menu->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Item added to cart']);
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

    public function checkout(Request $request)
    {
        $request->validate([
            'card-name' => 'required|string|max:255',
            'card-number' => 'required|digits_between:13,16',
            'card-expiration' => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/', // Format MM/YY
            'card-cvv' => 'required|digits:3',
            'card-type' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        Session::forget('cart');

        return redirect()->route('cart.index')->with('success', 'Checkout successful! Total: $' . number_format($total, 2));
    }
    
}
