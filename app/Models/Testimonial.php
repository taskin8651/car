<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'event_type',
        'message',
        'rating',
        'avatar_text',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
