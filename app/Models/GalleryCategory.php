<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name', 'slug', 'is_active'];

    public function images()
    {
        return $this->hasMany(GalleryImage::class, 'category_id');
    }
}
