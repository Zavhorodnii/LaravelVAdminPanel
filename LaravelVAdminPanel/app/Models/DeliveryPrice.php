<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_repeater',
        'title',
        'subtitle',
        'important_info',
    ];
}
