<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBlock extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'title_type_pay',
        'title_type_delivery',
        'title_place_delivery',
        'title_day_delivery',
    ];
}
