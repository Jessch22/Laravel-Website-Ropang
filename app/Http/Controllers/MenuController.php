<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    //index
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }
}
