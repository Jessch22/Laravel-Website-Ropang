<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\MenuItem;

class AdminMenuController extends Controller
{
  public function create()
    {
        return view('partials-admin.createmenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        MenuItem::create($request->all());

        return redirect()->route('screens.admindashboard')
            ->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = MenuItem::findOrFail($id);
        return view('partials-admin.editmenu', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        $menu = MenuItem::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('screens.admindashboard')
            ->with('success', 'Menu updated successfully.');
    }
}