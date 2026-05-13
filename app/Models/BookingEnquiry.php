<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'mobile_number',
        'email',
        'event_type',
        'event_date',
        'event_time',
        'pickup_location',
        'drop_location',
        'preferred_car',
        'decoration_required',
        'message',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
