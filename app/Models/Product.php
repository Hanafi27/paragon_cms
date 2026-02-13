<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'category', 'main_image', 'code', 'stock', 'certification', 'description'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
