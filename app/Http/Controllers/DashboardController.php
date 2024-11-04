<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Location;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $supplierCount = Supplier::count();
        $locationCount = Location::count();

        return view('admin.dashboard', compact('productCount', 'supplierCount', 'locationCount'));
    }
}
