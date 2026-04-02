<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\PatientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->with(['service', 'caregiver'])->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        try {
            $minAdvance = \App\Models\Setting::get('minimum_advance', 500);

            // Guest Registration Logic
            if (!Auth::check() && $request->filled('create_account')) {
                $request->validate([
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'patient_name' => 'required|string|max:255',
                    'patient_phone' => 'required|string|max:20',
                    'patient_address' => 'required|string|max:500',
                ]);

                $user = User::create([
                    'name' => $request->patient_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                $user->assignRole('Patient');

                PatientProfile::create([
                    'user_id' => $user->id,
                    'phone' => $request->patient_phone,
                    'address' => $request->patient_address,
                ]);

                Auth::login($user);
            }

            // Must be logged in or just registered to continue
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login or create an account to complete your booking.'
                ], 401);
            }

            $validated = $request->validate([
                'service_id' => 'required|exists:services,id',
                'caregiver_id' => 'nullable|exists:caregivers,id',
                'booking_date' => 'required|date|after_or_equal:today',
                'patient_name' => 'required|string|max:255',
                'patient_phone' => 'required|string|max:20',
                'patient_address' => 'required|string|max:500',
                'payment_method' => 'required|in:bkash,nagad,bank_transfer',
                'transaction_id' => 'required|string|max:100',
                'advance_amount' => 'required|numeric|min:' . $minAdvance,
            ]);

            $booking = Booking::create([
                'user_id' => Auth::id(),
                'service_id' => $validated['service_id'],
                'caregiver_id' => $validated['caregiver_id'] ?? null,
                'booking_date' => $validated['booking_date'],
                'status' => 'pending',
                'patient_name' => $validated['patient_name'],
                'patient_phone' => $validated['patient_phone'],
                'patient_address' => $validated['patient_address'],
                'payment_method' => $validated['payment_method'],
                'transaction_id' => $validated['transaction_id'],
                'advance_amount' => $validated['advance_amount'],
                'payment_status' => 'pending_verification',
            ]);

            return response()->json([
                'success' => true,
                'message' => '🎉 Your booking request has been submitted successfully! We will verify your payment shortly. You can track this in your dashboard.',
                'booking' => $booking
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Rethrow validation exception so Laravel handles it with 422
            throw $e;
        } catch (\Exception $e) {
            Log::error('Booking Store Error: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during booking: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function submitPayment(Request $request, Booking $booking)
    {
        // Ensure booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // Only allow if payment is unpaid or rejected
        if (!in_array($booking->payment_status, ['unpaid', 'rejected'])) {
            return back()->with('error', 'Payment info has already been submitted.');
        }

        $validated = $request->validate([
            'payment_method' => 'required|in:bkash,nagad,bank_transfer',
            'transaction_id' => 'required|string|max:100',
            'advance_amount' => 'required|numeric|min:100',
        ]);

        $booking->update([
            'payment_method'  => $validated['payment_method'],
            'transaction_id'  => $validated['transaction_id'],
            'advance_amount'  => $validated['advance_amount'],
            'payment_status'  => 'pending_verification',
        ]);

        return back()->with('success', 'Payment information submitted! We will verify it shortly.');
    }
}
