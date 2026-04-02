<?php

namespace Database\Factories;

use App\Models\DoctorProfile;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorProfileFactory extends Factory
{
    protected $model = DoctorProfile::class;

    public function definition(): array
    {
        $qualifications = [
            'MBBS, FCPS (Medicine)',
            'MBBS, MD (Cardiology)',
            'MBBS, MS (Orthopedics)',
            'MBBS, FCPS (Pediatrics)',
            'MBBS, MD (Neurology)',
            'MBBS, FCPS (Gynecology)',
            'BDS, FCPS (Dental Hygiene)',
        ];

        return [
            'user_id' => User::factory(),
            'department_id' => Department::inRandomOrder()->first()?->id ?? Department::factory(),
            'qualification' => $this->faker->randomElement($qualifications),
            'bmdc_number' => 'A-' . $this->faker->unique()->numberBetween(10000, 99999),
            'experience_years' => $this->faker->numberBetween(5, 30),
            'consultation_fee' => $this->faker->randomElement([500, 800, 1000, 1500, 2000]),
            'bio' => $this->faker->paragraph(),
            'phone' => $this->faker->phoneNumber(),
            'is_active' => true,
        ];
    }
}
