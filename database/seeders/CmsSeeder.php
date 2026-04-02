<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Menu;
use Illuminate\Support\Str;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Pages
        $pages = [
            [
                'title' => 'Photo Gallery',
                'content' => '<div class="grid grid-cols-2 lg:grid-cols-3 gap-4"><img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289" class="rounded-xl shadow-md"><img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874" class="rounded-xl shadow-md"><img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842" class="rounded-xl shadow-md"></div>',
                'meta_title' => 'Our Healthcare Moments | Gallery',
                'meta_description' => 'A glimpse into our compassionate care services and hospital facilities.',
            ],
            [
                'title' => 'FAQ',
                'content' => '<h2>Common Questions</h2><p>Find answers to our most frequently asked questions about caregiver services and appointments.</p>',
                'meta_title' => 'Help Center & FAQ',
                'meta_description' => 'Everything you need to know about ActiveCare services.',
            ],
            [
                'title' => 'Privacy Notice',
                'content' => '<h2>Your Privacy Matters</h2><p>We are committed to protecting your personal and medical data with the highest security standards.</p>',
                'meta_title' => 'Privacy Policy',
                'meta_description' => 'Read how we handle your data.',
            ],
            [
                'title' => 'Code of Ethics',
                'content' => '<h2>Our Professional Values</h2><p>Integrity, Compassion, and Excellence are the pillars of our caregiver network.</p>',
            ],
            [
                'title' => 'Patient Billing of Rights',
                'content' => '<h2>Know Your Rights</h2><p>Every patient has the right to transparent billing, respectful treatment, and clinical excellence.</p>',
            ],
        ];

        foreach ($pages as $p) {
            $p['slug'] = Str::slug($p['title']);
            $p['is_active'] = true;
            Page::create($p);
        }

        // 2. Create Menus
        $healthcareMenu = Menu::create([
            'name' => 'Healthcare',
            'url' => '#',
            'order_index' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Departments',
            'url' => '/departments',
            'parent_id' => $healthcareMenu->id,
            'order_index' => 1,
            'is_active' => true,
        ]);

        Menu::create([
            'name' => 'Doctors',
            'url' => '/doctors',
            'parent_id' => $healthcareMenu->id,
            'order_index' => 2,
            'is_active' => true,
        ]);

        $shopMenu = Menu::create([
            'name' => 'Health Shop',
            'url' => '/shop',
            'order_index' => 2,
            'is_active' => true,
        ]);

        $infoMenu = Menu::create([
            'name' => 'Information',
            'url' => '#',
            'order_index' => 3,
            'is_active' => true,
        ]);

        foreach (Page::all() as $page) {
            Menu::create([
                'name' => $page->title,
                'url' => '/' . $page->slug,
                'parent_id' => $infoMenu->id,
                'is_active' => true,
            ]);
        }
    }
}
