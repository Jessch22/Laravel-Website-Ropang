<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class homeController extends Controller
{
    //index
    public function index()
    {
        $menus = MenuItem::all(); 
        return view('index', compact('menus'));
    }
}
