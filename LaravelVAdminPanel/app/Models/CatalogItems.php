<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'catalog_id',
        'title',
        'file_id',
        'page_link',
        'top_title',
        'top_link',
    ];
}
