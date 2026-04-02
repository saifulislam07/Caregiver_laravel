<?php

namespace Database\Factories;

use App\Models\Caregiver;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaregiverFactory extends Factory
{
    protected $model = Caregiver::class;

    public function definition(): array
    {
        $specialities = ['Elderly Care', 'Home Nursing', 'Physiotherapy', 'Post-Op Care', 'Companion Care', 'Maternity Care', 'Pediatric Care'];

        return [
            'user_id' => User::factory(),
            'speciality' => $this->faker->randomElement($specialities),
            'experience' => $this->faker->numberBetween(3, 20) . ' Years',
            'bio' => $this->faker->paragraph(),
            'availability' => $this->faker->boolean(80),
            'rating' => $this->faker->randomFloat(1, 4, 5),
        ];
    }
}
