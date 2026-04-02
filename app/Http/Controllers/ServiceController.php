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
        
        return view('services.show', compact('service', 'caregivers'));
    }
}
