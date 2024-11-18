<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Request as UserRequest;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah barang sesuai kategori untuk user
        $availableItemsCount = Item::where('status', 'available')->count();
        $borrowedItemsCount = Item::where('status', 'borrowed')->where('user_id', Auth::id())->count();
        $inRepairItemsCount = Item::where('status', 'in_repair')->count();

        // Menghitung jumlah permintaan yang pernah diajukan user
        $requestsCount = UserRequest::where('user_id', Auth::id())->count();

        // Ambil notifikasi terbaru untuk user
        // $notifications = Notification::where('user_id', Auth::id())
        //     ->orderBy('created_at', 'desc')
        //     ->take(5)
        //     ->get();

        // Kirim data ke view
        return view('user.userlist', compact(
            'availableItemsCount',
            'borrowedItemsCount',
            'inRepairItemsCount',
            'requestsCount',
        ));
    }
}
