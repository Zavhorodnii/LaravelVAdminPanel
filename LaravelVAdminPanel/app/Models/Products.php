<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'price',
        'regular_price',
        'weight',
        'length',
        'width',
        'height',
        'dimensions',
        'file_id',
        'features_title',
        'description_title',
        'description',
        'related_products_title',
        'related_products_description',
    ];
}
