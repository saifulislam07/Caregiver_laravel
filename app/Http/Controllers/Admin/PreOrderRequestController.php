<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreOrderRequest;
use Illuminate\Http\Request;

class PreOrderRequestController extends Controller
{
    public function index()
    {
        $requests = PreOrderRequest::with('user')->latest()->get();
        return view('admin.pre-orders.index', compact('requests'));
    }

    public function show(PreOrderRequest $pre_order)
    {
        return view('admin.pre-orders.show', compact('pre_order'));
    }

    public function update(Request $request, PreOrderRequest $pre_order)
    {
        $request->validate([
            'status' => 'required',
            'admin_notes' => 'nullable',
        ]);

        $pre_order->update($request->only(['status', 'admin_notes']));

        return redirect()->route('pre-orders.index')->with('success', 'Request updated successfully.');
    }

    public function destroy(PreOrderRequest $pre_order)
    {
        $pre_order->delete();
        return redirect()->route('pre-orders.index')->with('success', 'Request deleted successfully.');
    }
}
