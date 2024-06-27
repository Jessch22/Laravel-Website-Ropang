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

        return redirect()->route('screens.admindashboard')->with('success', 'Menu deleted successfully.');
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

    // RESERVATION
    public function updateReserveStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'reservationId' => 'required|integer|exists:reservations,id',
        ]);

        try {
            $reservation = Reservation::findOrFail($request->reservationId);
            $reservation->status = $request->status;
            $reservation->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroyReservation($id)
    {
        $menu = Reservation::findOrFail($id);
        $menu->delete();

        return redirect()->route('screens.admindashboard')->with('success', 'Reservation deleted successfully.');
    }

    // CONTACT
    public function updateContactStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'contactId' => 'required|integer|exists:contacts,id',
        ]);

        try {
            $contact = Contact::findOrFail($request->contactId);
            $contact->status = $request->status;
            $contact->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function destroyContact($id)
    {
        $menu = Contact::findOrFail($id);
        $menu->delete();

        return redirect()->route('screens.admindashboard')->with('success', 'Contact deleted successfully.');
    }
}