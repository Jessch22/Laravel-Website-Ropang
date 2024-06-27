<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('other-page.cart');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        $user = Auth::user();

        foreach ($cart as $id => $details) {
            Purchase::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'quantity' => $details['quantity'],
                'total_price' => $details['quantity'] * $details['price'],
                'notes' => $request->notes,
                'status' => 'pending'
            ]);
        }

        session()->forget('cart');

        return redirect()->route('other-page.cart')->with('success', 'Checkout successful');
    }
}
