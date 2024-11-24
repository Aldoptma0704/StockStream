<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RequestItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Session::get('user')['id'];

        $requests = RequestItem::where('user_id', $userId)->get();

        return view('user.requestItems.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.requestItems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|string|max:255',
        ]);

        // Simpan permintaan barang ke database
        RequestItem::create([
            'user_id' => Session::get('user')['id'],
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('user.requestItems.index')->with('success', 'Permintaan barang berhasil diajukan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
