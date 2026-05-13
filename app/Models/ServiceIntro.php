<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceIntro extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_icon',
        'tag_title',
        'title',
        'description',
        'pills',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'pills' => 'array',
        'status' => 'boolean',
    ];
}
