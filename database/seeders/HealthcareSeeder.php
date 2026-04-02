<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DoctorProfile;
use App\Models\User;
use App\Models\Product;
use App\Models\Caregiver;
use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HealthcareSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Departments
        $depts = [
            'Cardiology', 'Neurology', 'Orthopedics', 'Pediatrics', 
            'Gynecology', 'Dermatology', 'Ophthalmology', 'ENT', 
            'Dental Care', 'Physical Medicine'
        ];

        foreach ($depts as $dept) {
            Department::create([
                'name' => $dept,
                'slug' => Str::slug($dept),
                'description' => 'Specialized ' . $dept . ' services for all patients.',
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=2053',
            ]);
        }

        // 2. Doctors (30 Doctors)
        $departments = Department::all();
        foreach ($departments as $dept) {
            // Create 3 doctors per department
            for ($i = 0; $i < 3; $i++) {
                $user = User::factory()->create([
                    'name' => 'Dr. ' . fake()->name(),
                ]);
                $user->assignRole('Doctor');

                DoctorProfile::factory()->create([
                    'user_id' => $user->id,
                    'department_id' => $dept->id,
                ]);
            }
        }

        // 3. Products (60+ Products)
        Product::factory()->count(60)->create();

        // 4. Caregivers (30+ Caregivers)
        for ($i = 0; $i < 30; $i++) {
            $user = User::factory()->create();
            $user->assignRole('Caregiver');
            Caregiver::factory()->create(['user_id' => $user->id]);
        }

        // 5. Health Packages
        $packages = [
            ['name' => 'Basic Wellness', 'price' => 1500, 'features' => ['Consultation', 'ECG', 'Blood Test']],
            ['name' => 'Premium Cardiac', 'price' => 5500, 'features' => ['Cardiologist Consult', 'Echo', 'TMT', 'Lipid Profile']],
            ['name' => 'Elderly Care Plus', 'price' => 12000, 'features' => ['Weekly Home Visit', 'Chronic Med Management', '24/7 Support']],
            ['name' => 'Child Health Plus', 'price' => 3500, 'features' => ['Pediatric Consult', 'Growth Monitoring', 'Immunization Review']],
            ['name' => 'Post-Op Recovery', 'price' => 8500, 'features' => ['Daily Nurse Visit', 'Wound Care', 'Pain Management']],
        ];

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }
}
