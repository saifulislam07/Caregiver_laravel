<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caregiver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CaregiverController extends Controller
{
    public function index()
    {
        $caregivers = Caregiver::with('user')->latest()->get();
        return view('admin.caregivers.index', compact('caregivers'));
    }

    public function create()
    {
        return view('admin.caregivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'speciality' => 'required',
            'experience' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Caregiver');

        $data = $request->except(['name', 'email', 'password']);
        $data['user_id'] = $user->id;

        Caregiver::create($data);

        return redirect()->route('caregivers.index')->with('success', 'Caregiver created successfully.');
    }

    public function edit(Caregiver $caregiver)
    {
        return view('admin.caregivers.edit', compact('caregiver'));
    }

    public function update(Request $request, Caregiver $caregiver)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $caregiver->user_id,
            'speciality' => 'required',
            'experience' => 'required',
        ]);

        $caregiver->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $caregiver->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $caregiver->update($request->except(['name', 'email', 'password']));

        return redirect()->route('caregivers.index')->with('success', 'Caregiver updated successfully.');
    }

    public function destroy(Caregiver $caregiver)
    {
        $user = $caregiver->user;
        $caregiver->delete();
        $user->delete();

        return redirect()->route('caregivers.index')->with('success', 'Caregiver deleted successfully.');
    }
}
