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
        return view('index', compact('menus'));
    }

    public function bookTable(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|integer',
            'message' => 'nullable|string',
        ]);

        Reservation::create($validatedData);

        return redirect('/#book-a-table')->with('success', 'Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!')->with('section', 'book-a-table');
    }

    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);        

        return redirect('/#contact')->with('success', 'Your message has been sent.<br>Thank you!')->with('section', 'contact');
    }
}
