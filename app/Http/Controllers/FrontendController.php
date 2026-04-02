<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Package;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')->latest()->take(6)->get();
        $packages = Package::latest()->get();

        return view('welcome', compact('services', 'packages'));
    }
}
