<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $products = [
            'Vitamin C 500mg', 'Digital BP Monitor', 'Surgical Mask', 'Hand Sanitizer', 'Pulse Oximeter',
            'Multivitamin', 'Whey Protein', 'Lens Solution', 'Electric Toothbrush', 'Omega-3 Fish Oil',
            'Calcium D3', 'Digital Thermometer', 'Back Support', 'Yoga Mat', 'First Aid Kit',
            'Sanitizing Wipes', 'Sunscreen SPF 50', 'Cough Syrup', 'Glucometer', 'Nebulizer',
            'Knee Brace', 'Elastic Bandage', 'Antiseptic Cream', 'Pain Relief Gel', 'Eye Drops',
            'Ear Drops', 'Nasal Spray', 'Insulin Pen', 'Compression Socks', 'Face Shield',
            'N95 Respirator', 'Alcohol Swabs', 'Cotton Rolls', 'Surgical Tape', 'Gloves Box',
            'Stethoscope', 'Weight Scale', 'Hot Water Bag', 'Ice Pack', 'Humidifier',
            'Air Purifier', 'Inhaler', 'Blood Lancet', 'Urine Bag', 'IV Set',
            'Syringe 5ml', 'Hand Wash', 'Body Lotion', 'Baby Oil', 'Diapers Pack',
            'Sanitary Napkins', 'Adult Diapers', 'Mouthwash', 'Dental Floss', 'Toothpaste',
            'Shampoo', 'Conditioner', 'Face Wash', 'Mirror', 'Comb Set'
        ];

        $name = $this->faker->unique()->randomElement($products);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 5, 2000),
            'stock' => $this->faker->numberBetween(0, 50),
            'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae', // Default medical product image
            'is_active' => true,
        ];
    }
}
