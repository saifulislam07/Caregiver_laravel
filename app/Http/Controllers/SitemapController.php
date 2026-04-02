<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use App\Models\DoctorProfile;
use App\Models\Department;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate a dynamic XML sitemap.
     */
    public function index()
    {
        $urls = [];

        // Static Pages
        $urls[] = ['url' => route('home'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '1.0', 'changefreq' => 'daily'];
        $urls[] = ['url' => route('services.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.8', 'changefreq' => 'weekly'];
        $urls[] = ['url' => route('faqs.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.7', 'changefreq' => 'monthly'];
        $urls[] = ['url' => route('gallery.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.6', 'changefreq' => 'monthly'];
        $urls[] = ['url' => route('doctors.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.8', 'changefreq' => 'weekly'];
        $urls[] = ['url' => route('departments.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.7', 'changefreq' => 'weekly'];
        $urls[] = ['url' => route('shop.index'), 'lastmod' => now()->tz('UTC')->toAtomString(), 'priority' => '0.8', 'changefreq' => 'weekly'];

        // Dynamic Services
        $services = Service::where('status', 'active')->get();
        foreach ($services as $service) {
            $urls[] = [
                'url' => route('services.show', $service->slug),
                'lastmod' => $service->updated_at->tz('UTC')->toAtomString(),
                'priority' => '0.9',
                'changefreq' => 'weekly'
            ];
        }

        // Dynamic Doctors
        $doctors = DoctorProfile::where('is_active', true)->get();
        foreach ($doctors as $doctor) {
            $urls[] = [
                'url' => route('doctors.show', $doctor->id),
                'lastmod' => $doctor->updated_at->tz('UTC')->toAtomString(),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ];
        }

        // Dynamic Departments
        $departments = Department::where('is_active', true)->get();
        foreach ($departments as $department) {
            $urls[] = [
                'url' => route('departments.show', $department->slug),
                'lastmod' => $department->updated_at->tz('UTC')->toAtomString(),
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ];
        }

        // Dynamic Products
        $products = Product::where('is_active', true)->get();
        foreach ($products as $product) {
            $urls[] = [
                'url' => route('shop.show', $product->slug),
                'lastmod' => $product->updated_at->tz('UTC')->toAtomString(),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ];
        }

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
