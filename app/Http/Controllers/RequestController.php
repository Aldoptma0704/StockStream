<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    public function index() {
        $requests = RequestModel::where('status', 'Pending')->get();
        return view('admin.request.index', compact('requests'));
    }
    
    public function show($id) {
        $request = RequestModel::findOrFail($id);
        return view('admin.requests.show', compact('requests'));
    }
    
    public function approve($id) {
        $request = RequestModel::findOrFail($id);
        $request->status = 'Approved';
        $request->save();
        return redirect()->route('admin.requests.index')->with('success', 'Permintaan disetujui.');
    }    
    
    public function reject($id) {
        $request = RequestModel::findOrFail($id);
        $request->status = 'Rejected';
        $request->save();
        return redirect()->route('admin.requests.index')->with('error', 'Permintaan ditolak.');
    }
    
}
