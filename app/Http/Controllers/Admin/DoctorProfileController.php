<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctors = DoctorProfile::with(['user', 'department'])->latest()->get();
        return view('admin.doctor-profiles.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::where('is_active', true)->get();
        return view('admin.doctor-profiles.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'department_id' => 'required|exists:departments,id',
            'consultation_fee' => 'required|numeric',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Doctor');

        $data = $request->except(['name', 'email', 'password']);
        $data['user_id'] = $user->id;

        DoctorProfile::create($data);

        return redirect()->route('doctor-profiles.index')->with('success', 'Doctor created successfully.');
    }

    public function edit(DoctorProfile $doctor_profile)
    {
        $departments = Department::where('is_active', true)->get();
        return view('admin.doctor-profiles.edit', compact('doctor_profile', 'departments'));
    }

    public function update(Request $request, DoctorProfile $doctor_profile)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $doctor_profile->user_id,
            'department_id' => 'required|exists:departments,id',
            'consultation_fee' => 'required|numeric',
        ]);

        $doctor_profile->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $doctor_profile->user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $doctor_profile->update($request->except(['name', 'email', 'password']));

        return redirect()->route('doctor-profiles.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(DoctorProfile $doctor_profile)
    {
        $user = $doctor_profile->user;
        $doctor_profile->delete();
        $user->delete();

        return redirect()->route('doctor-profiles.index')->with('success', 'Doctor deleted successfully.');
    }
}
