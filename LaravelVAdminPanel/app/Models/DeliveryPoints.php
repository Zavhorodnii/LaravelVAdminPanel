<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPoints extends Model
{
    use HasFactory;
    protected $fillable = [
        'region',
        'point_style',
    ];
}
