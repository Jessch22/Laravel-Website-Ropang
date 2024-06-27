<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Contact;
use App\Models\Reservation;

class indexController extends Controller
{
    //index
    public function index()
    {
        $menus = MenuItem::all(); 
        return view('screens.index', compact('menus'));
    }

    public function bookTable(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'people' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'people' => $request->people,
            'message' => $request->message,
        ]);

        return redirect('/#book-a-table')->with('success', 'Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!')->with('section', 'book-a-table');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'pending'
        ]);        

        return redirect('/#contactForm')->with('success', 'Your message has been sent.<br>Thank you!')->with('section', 'contact');
    }
}
