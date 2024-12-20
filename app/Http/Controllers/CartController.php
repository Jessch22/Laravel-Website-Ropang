<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $menu = Menu::find($request->menu_id);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['quantity']++;
        } else {
            $cart[$menu->id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['status' => 'Item added to cart']);
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
