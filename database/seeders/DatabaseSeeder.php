<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@activecare.com',
            'password' => bcrypt('password'),
        ]);

        // Caregivers
        $caregiversData = [
            ['name' => 'Sarah Johnson', 'email' => 'sarah@activecare.com', 'speciality' => 'Elderly Care', 'experience' => '5 Years', 'bio' => 'Certified caregiver specializing in senior support and medication management.'],
            ['name' => 'Michael Smith', 'email' => 'michael@activecare.com', 'speciality' => 'Post-Op Care', 'experience' => '8 Years', 'bio' => 'Experienced in post-surgical recovery and rehabilitation support.'],
            ['name' => 'Emily Davis', 'email' => 'emily@activecare.com', 'speciality' => 'Home Nursing', 'experience' => '10 Years', 'bio' => 'Registered nurse with extensive experience in home-based clinical care.'],
        ];

        foreach ($caregiversData as $data) {
            $user = User::factory()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('password'),
            ]);

            \App\Models\Caregiver::create([
                'user_id' => $user->id,
                'speciality' => $data['speciality'],
                'experience' => $data['experience'],
                'bio' => $data['bio'],
                'availability' => true,
                'rating' => rand(40, 50) / 10,
            ]);
        }

        // Services
        \App\Models\Service::create([
            'name' => 'Elderly Care',
            'slug' => 'elderly-care',
            'description' => 'Professional assistance for seniors including companion services, medication reminders, and daily activity support.',
            'price' => 15.00,
            'image' => 'https://img.freepik.com/free-photo/social-worker-visiting-senior-man_23-2148181381.jpg',
            'status' => 'active',
            'meta_title' => 'Best Elderly Care Services in Dhaka | ActiveCare',
            'meta_description' => 'Reliable and compassionate elderly care services at home. Professional caregivers available 24/7.',
        ]);

        \App\Models\Service::create([
            'name' => 'Home Nursing',
            'slug' => 'home-nursing',
            'description' => 'Registered nurses providing medical support, wound dressing, injection administration, and clinical monitoring at home.',
            'price' => 25.00,
            'image' => 'https://img.freepik.com/free-photo/nurse-helping-senior-man_23-2148181393.jpg',
            'status' => 'active',
            'meta_title' => 'Professional Home Nursing Services | ActiveCare',
            'meta_description' => 'Get hospital-grade nursing care at your doorstep. Experienced registered nurses for clinical support.',
        ]);

        \App\Models\Service::create([
            'name' => 'Physiotherapy',
            'slug' => 'physiotherapy',
            'description' => 'Specialized physical therapy sessions to help restore movement and function after injury, illness, or disability.',
            'price' => 20.00,
            'image' => 'https://img.freepik.com/free-photo/doctor-doing-physiotherapy-with-senior-patient_23-2148181373.jpg',
            'status' => 'active',
            'meta_title' => 'Home Physiotherapy Services | ActiveCare',
            'meta_description' => 'Qualified physiotherapists for home visits. Effective treatment for pain relief and rehabilitation.',
        ]);

        // Packages
        \App\Models\Package::create([
            'name' => 'Basic Care Plan',
            'price' => 299.00,
            'features' => ['8 Hours Daily Support', 'Weekly Doctor Visit', 'Medication Management', 'Basic Vital Monitoring'],
        ]);

        \App\Models\Package::create([
            'name' => 'Premium Care Plan',
            'price' => 599.00,
            'features' => ['12 Hours Daily Support', 'Bi-weekly Doctor Visit', 'Certified Nursing Assistant', 'Advanced Vital Monitoring', 'Emergency Support'],
        ]);

        \App\Models\Package::create([
            'name' => 'Elite Care Plan',
            'price' => 999.00,
            'features' => ['24/7 Dedicated Care', 'Weekly Specialized Checkup', 'Registered Professional Nurse', 'Full Medical Equipment Support', 'Unlimited Consultation'],
        ]);
    }
}
