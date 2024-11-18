<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function available()
    {
        $availableItems = Item::where('status', 'available')->get();
        return view('user.items.available', compact('availableItems'));
    }
}
