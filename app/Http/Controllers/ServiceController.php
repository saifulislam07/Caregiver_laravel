<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Caregiver;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('status', 'active')->latest()->paginate(12);
        return view('services.index', compact('services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $caregivers = Caregiver::where('availability', true)->with('user')->get();
        
        // Fetch payment settings
        $minAdvance = \App\Models\Setting::get('minimum_advance', 500);
        $bkashNum = \App\Models\Setting::get('bkash_number', '017XXXXXXXX');
        $bkashType = \App\Models\Setting::get('bkash_type', 'Personal');
        $nagadNum = \App\Models\Setting::get('nagad_number', '017XXXXXXXX');
        $nagadType = \App\Models\Setting::get('nagad_type', 'Personal');
        $bankName = \App\Models\Setting::get('bank_name', 'Example Bank');
        $bankAccName = \App\Models\Setting::get('bank_account_name', 'Healora Health');
        $bankAccNum = \App\Models\Setting::get('bank_account_number', '1234567890');
        $bankRouting = \App\Models\Setting::get('bank_routing', '123456789');
        $bankBranch = \App\Models\Setting::get('bank_branch', 'Dhaka');
        
        return view('services.show', compact(
            'service', 'caregivers', 'minAdvance', 
            'bkashNum', 'bkashType', 'nagadNum', 'nagadType', 
            'bankName', 'bankAccName', 'bankAccNum', 'bankRouting', 'bankBranch'
        ));
    }
}
