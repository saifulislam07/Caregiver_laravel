<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // 1. Roles & Admin
        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('111111'),
        ]);
        $admin->assignRole('Admin');

        // Create Patient User
        $patient = User::create([
            'name'     => 'John Patient',
            'email'    => 'patient@admin.com',
            'password' => bcrypt('password'),
        ]);
        $patient->assignRole('Patient');

        // Add Patient Profile
        \App\Models\PatientProfile::create([
            'user_id' => $patient->id,
            'phone'   => '01700000000',
            'address' => 'Dhaka, Bangladesh',
        ]);

        // 2. CMS & Healthcare
        $this->call([
            CmsSeeder::class,
            HealthcareSeeder::class,
            FaqSeeder::class,
            GallerySeeder::class,
        ]);

        // 3. Additional Caregivers
        $caregiversData = [
            ['name' => 'Sarah Johnson', 'email' => 'sarah@activecare.com', 'speciality' => 'Elderly Care', 'experience' => '5 Years', 'bio' => 'Certified caregiver specializing in senior support and medication management.'],
            ['name' => 'Michael Smith', 'email' => 'michael@activecare.com', 'speciality' => 'Post-Op Care', 'experience' => '8 Years', 'bio' => 'Experienced in post-surgical recovery and rehabilitation support.'],
        ];

        foreach ($caregiversData as $data) {
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt('password'),
            ]);
            $user->assignRole('Caregiver');

            \App\Models\Caregiver::create([
                'user_id'      => $user->id,
                'speciality'   => $data['speciality'],
                'experience'   => $data['experience'],
                'bio'          => $data['bio'],
                'availability' => true,
                'rating'       => rand(40, 50) / 10,
            ]);
        }

        // 4. Initial Services
        \App\Models\Service::create([
            'name'        => 'Elderly Care',
            'slug'        => 'elderly-care',
            'description' => 'Professional assistance for seniors including companion services, medication reminders, and daily activity support.',
            'price'       => 15.00,
            'image'       => 'https://images.unsplash.com/photo-1581056771107-24ca5f033842',
            'status'      => 'active',
        ]);
    }
}
