<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
        'mobile',
        'event_type',
        'event_date',
        'pickup_location',
        'decoration_required',
        'message',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
