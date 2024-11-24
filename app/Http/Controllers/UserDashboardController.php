<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowReq;
use App\Models\Product;
use App\Models\Location;
    
class UserDashboardController extends Controller
{
    public function dashboard(){

        $productCount = Product::count();
        $borrowedItemsCount = BorrowReq::where('status', 'pending')->count();
        $borrowRequestCount = BorrowReq::where('status', 'pending')->count();
        $requestItemsCount = BorrowReq::where('status', 'pending')->count();
    
        return view('user.dashboard', compact('productCount', 'borrowedItemsCount', 'borrowRequestCount', 'requestItemCount'));
    }
}
