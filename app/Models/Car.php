<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'brand',
        'model',
        'category',
        'color',
        'seating',
        'decoration',
        'driver',
        'price_text',
        'price_note',
        'status_label',
        'status_class',
        'tag_icon',
        'tag_title',
        'summary',
        'description_title',
        'description_one',
        'description_two',
        'image_url',
        'image_alt',
        'gallery_urls',
        'specs',
        'quick_points',
        'features',
        'locations',
        'terms',
        'enquiry_url',
        'whatsapp_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'gallery_urls' => 'array',
        'specs' => 'array',
        'quick_points' => 'array',
        'features' => 'array',
        'locations' => 'array',
        'terms' => 'array',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('car_main_image')
            ->singleFile();

        $this->addMediaCollection('car_gallery');
    }

    public function getMainImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('car_main_image')
            ?: ($this->image_url ?: 'https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=1300&q=80');
    }

    public function getGalleryImageUrlsAttribute(): array
    {
        $mediaUrls = $this->getMedia('car_gallery')
            ->map(fn ($media) => $media->getUrl())
            ->values()
            ->toArray();

        if (!empty($mediaUrls)) {
            return $mediaUrls;
        }

        return $this->gallery_urls ?: [$this->main_image_url];
    }
}
