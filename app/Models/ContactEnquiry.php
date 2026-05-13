<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'mobile_number',
        'email',
        'event_type',
        'event_date',
        'preferred_car',
        'pickup_location',
        'decoration_required',
        'message',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
