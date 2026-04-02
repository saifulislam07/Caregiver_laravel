<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->with(['service', 'caregiver'])->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'caregiver_id' => 'nullable|exists:caregivers,id',
            'booking_date' => 'required|date|after:now',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'caregiver_id' => $validated['caregiver_id'],
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your booking request has been submitted successfully!',
            'booking' => $booking
        ]);
    }
}
