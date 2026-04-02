<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\PreOrderRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }

        $appointments = Appointment::where('patient_id', $user->id)->latest()->take(5)->get();
        $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        $preOrders = PreOrderRequest::where('user_id', $user->id)->latest()->take(5)->get();

        return view('dashboard', compact('appointments', 'orders', 'preOrders'));
    }
}

