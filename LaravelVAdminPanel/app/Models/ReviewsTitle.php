<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewsTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'title_text',
        'title_video',
        'title_audio',
    ];
}
