<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'doctors' => DoctorProfile::count(),
            'appointments' => Appointment::count(),
            'patients' => User::role('Patient')->count(),
            'orders' => Order::where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
