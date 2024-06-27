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
        $cart = session('cart');
        $total = 0;

        if (!empty($cart)) {
            foreach ($cart as $id => $details) {
                $total += $details['quantity'] * $details['price'];
            }
        }

    return view('other-page.cart', ['total' => $total]);
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
