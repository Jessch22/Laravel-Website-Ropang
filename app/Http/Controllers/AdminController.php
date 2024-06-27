<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\MenuItem;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $menus = MenuItem::all();
        $reservations = Reservation::all();
        $contact = Contact::all();

        $users = User::withCount('purchases')
            ->withSum('purchases', 'total_price')
            ->get();

        $users->each(function ($user) {
            $user->purchases_count = $user->purchases_count ?? 0;
            $user->purchases_sum_total_price = $user->purchases_sum_total_price ?? 0;
        });

        $totalUsers = User::count();
        $totalPurchases = $users->sum('purchases_count');
        $totalExpenditure = $users->sum('purchases_sum_total_price');   

        return view('screens.admindashboard', compact('menus',  'reservations', 'users', 'contact', 'totalUsers', 'totalPurchases', 'totalExpenditure'));
    }

    // MENU

    public function destroy($id)
    {
        $menu = MenuItem::findOrFail($id);
        $menu->delete();

        return redirect()->route('partials-admin.menus')->with('success', 'Menu deleted successfully.');
    }

    public function edit($id)
    {
        $menu = MenuItem::findOrFail($id);
        return view('screens.editmenu', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = MenuItem::findOrFail($id);
        $menu->name = $request->input('name');
        $menu->description = $request->input('description');
        $menu->price = $request->input('price');
        $menu->category = $request->input('category');
        $menu->save();

        return redirect()->route('partials-admin.menus')->with('success', 'Menu updated successfully.');
    }

    // USER
    public function updateRole(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
            'userId' => 'required|integer|exists:users,id',
        ]);

        try {
            $user = User::findOrFail($request->userId);
            $user->role = $request->role;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Role updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('screens.admindashboard')->with('success', 'User deleted successfully.');
    }
}