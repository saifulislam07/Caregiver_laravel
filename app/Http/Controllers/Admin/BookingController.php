<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'service', 'caregiver']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $bookings = $query->latest()->paginate(20);
        
        // Stats
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'approved' => Booking::where('status', 'approved')->count(),
            'awaiting_payment' => Booking::where('payment_status', 'pending_verification')->count(),
            'verified_payment' => Booking::where('payment_status', 'verified')->count(),
            'total_revenue' => Booking::where('payment_status', 'verified')->sum('advance_amount'),
        ];

        return view('admin.bookings.index', compact('bookings', 'stats'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'service', 'caregiver']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,completed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', "Booking status updated to {$request->status}.");
    }

    public function updatePayment(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_status' => 'required|in:unpaid,pending_verification,verified,rejected',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $booking->update([
            'payment_status' => $request->payment_status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', "Payment status updated to {$request->payment_status}.");
    }
}
