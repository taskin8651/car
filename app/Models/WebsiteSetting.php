<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'tagline',
        'meta_title',
        'meta_description',
        'meta_keywords',
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
        'logo_url',
        'favicon_url',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo')->singleFile();
        $this->addMediaCollection('site_favicon')->singleFile();
    }

    public function getLogoSrcAttribute(): ?string
    {
        return $this->getFirstMediaUrl('site_logo') ?: $this->logo_url;
    }

    public function getFaviconSrcAttribute(): ?string
    {
        return $this->getFirstMediaUrl('site_favicon') ?: $this->favicon_url;
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'site_name' => 'CarBookKro',
            'tagline' => 'Luxury Wedding Cars',
            'meta_title' => 'CarBookKro | Premium Luxury Wedding Car Rental Service',
            'meta_description' => 'Book luxury wedding cars for groom entry, bridal entry, reception, engagement and premium events.',
            'meta_keywords' => 'luxury wedding car rental, groom entry car, bridal entry car, premium car rental',
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
            'logo_url' => null,
            'favicon_url' => null,
        ]);
    }
}
