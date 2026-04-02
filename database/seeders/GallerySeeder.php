<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Our Facility', 'Medical Team', 'Community Events', 'Diagnostic Lab'];

        foreach ($categories as $catName) {
            $category = GalleryCategory::create([
                'name' => $catName,
                'slug' => Str::slug($catName),
                'is_active' => true,
            ]);

            // Add 4-6 placeholder images per category
            for ($i = 1; $i <= rand(4, 6); $i++) {
                GalleryImage::create([
                    'category_id' => $category->id,
                    'image_path' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=800', // Healthcare placeholder
                    'title' => $catName . ' View ' . $i,
                    'is_active' => true,
                ]);
            }
        }
    }
}
