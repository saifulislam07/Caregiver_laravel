<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with('category')->latest()->get();
        return view('admin.gallery.images.index', compact('images'));
    }

    public function create()
    {
        $categories = GalleryCategory::where('is_active', true)->get();
        return view('admin.gallery.images.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:gallery_categories,id',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // 5MB max
        ]);

        $category = GalleryCategory::findOrFail($request->category_id);
        $uploadedCount = 0;

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store directly in root public/gallery folder
                $path = $image->store('gallery/' . $category->slug, 'root_public');
                
                GalleryImage::create([
                    'category_id' => $category->id,
                    'image_path' => $path,
                    'is_active' => true,
                ]);
                
                $uploadedCount++;
            }
        }

        return redirect()->route('gallery-images.index')->with('success', "$uploadedCount images uploaded successfully to {$category->name}.");
    }

    public function destroy(GalleryImage $galleryImage)
    {
        // Delete physical file from root public folder
        if (Storage::disk('root_public')->exists($galleryImage->image_path)) {
            Storage::disk('root_public')->delete($galleryImage->image_path);
        }
        
        $galleryImage->delete();
        return redirect()->route('gallery-images.index')->with('success', 'Image deleted successfully.');
    }
}
