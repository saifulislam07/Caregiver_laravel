<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Package;
use App\Models\Page;
use App\Models\Product;
use App\Models\DoctorProfile;
use App\Models\Department;
use App\Models\Faq;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')->latest()->take(6)->get();
        $packages = Package::all();
        $faqs = Faq::where('is_active', true)->orderBy('order_index')->take(5)->get();

        return view('welcome', compact('services', 'packages', 'faqs'));
    }

    public function faqs()
    {
        $faqs = Faq::where('is_active', true)->orderBy('order_index')->get();
        return view('frontend.faqs', compact('faqs'));
    }

    public function gallery(Request $request)
    {
        $categories = GalleryCategory::where('is_active', true)->get();
        $query = GalleryImage::with('category')->where('is_active', true);
        
        if ($request->has('category')) {
            $category = GalleryCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $images = $query->latest()->paginate(20);
        
        return view('frontend.gallery', compact('images', 'categories'));
    }

    public function doctors(Request $request)
    {
        $query = DoctorProfile::with(['user', 'department'])->where('is_active', true);
        
        if ($request->has('department')) {
            $query->where('department_id', $request->department);
        }

        $doctors = $query->latest()->paginate(12);
        $departments = Department::all();
        
        return view('frontend.doctors.index', compact('doctors', 'departments'));
    }

    public function doctorShow($id)
    {
        $doctor = DoctorProfile::with(['user', 'department'])->findOrFail($id);
        return view('frontend.doctors.show', compact('doctor'));
    }

    public function departments()
    {
        $departments = Department::where('is_active', true)->get();
        return view('frontend.departments.index', compact('departments'));
    }

    public function departmentShow($slug)
    {
        $department = Department::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $doctors = DoctorProfile::with(['user', 'department'])
            ->where('department_id', $department->id)
            ->where('is_active', true)
            ->get();
            
        return view('frontend.departments.show', compact('department', 'doctors'));
    }

    public function shop()
    {
        $products = Product::where('is_active', true)->latest()->paginate(12);
        return view('frontend.shop', compact('products'));
    }

    public function productShow($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
            
        return view('frontend.product_detail', compact('product', 'relatedProducts'));
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.page', compact('page'));
    }
}
