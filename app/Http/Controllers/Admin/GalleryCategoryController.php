<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::latest()->get();
        return view('admin.gallery.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:gallery_categories,name',
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery.categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name' => 'required|unique:gallery_categories,name,' . $galleryCategory->id,
        ]);

        $galleryCategory->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('gallery-categories.index')->with('success', 'Category deleted successfully.');
    }
}
