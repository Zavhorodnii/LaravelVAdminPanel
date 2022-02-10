<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryWorkRegion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_for_select',
        'region',
    ];
}
