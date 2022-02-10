<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPriceItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_all_cities_id',
        'weight_form',
        'weight_to',
        'price',
    ];
}
