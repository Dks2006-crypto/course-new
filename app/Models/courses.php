<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'description', 'price', 'time', 'image', 'is_active', 'is_promo', 'is_new', 'is_popular'];

     public function brand()
     {
        return $this->belongsTo(Brand::class);
     }
}
