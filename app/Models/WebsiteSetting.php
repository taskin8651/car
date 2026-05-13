<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'tagline',
        'phone',
        'alternate_phone',
        'whatsapp_number',
        'whatsapp_url',
        'email',
        'business_address',
        'google_map_embed_url',
        'opening_hours',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'privacy_policy_url',
        'terms_url',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'site_name' => 'CarBookKro',
            'tagline' => 'Luxury Wedding Cars',
            'phone' => '+91 99999 99999',
            'alternate_phone' => null,
            'whatsapp_number' => '+91 99999 99999',
            'whatsapp_url' => 'https://wa.me/919999999999',
            'email' => 'info@carbookkro.com',
            'business_address' => 'Your Business Address, India',
            'google_map_embed_url' => 'https://www.google.com/maps?q=India&output=embed',
            'opening_hours' => 'Mon - Sun: 9:00 AM - 9:00 PM',
            'facebook_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
            'privacy_policy_url' => '#',
            'terms_url' => '#',
        ]);
    }
}
