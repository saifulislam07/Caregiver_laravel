<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'image', 'status', 'meta_title', 'meta_description'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
