<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Location;
use App\Models\Request as RequestModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $supplierCount = Supplier::count();
        $locationCount = Location::count();
        $requestCount = RequestModel::count();

        return view('admin.dashboard', compact('productCount', 'supplierCount', 'locationCount', 'requestCount'));
    }
}
