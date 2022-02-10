<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'draft',
        'person_name',
        'video_url',
        'review',
    ];
}
