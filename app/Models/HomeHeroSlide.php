<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeHeroSlide extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'tag_icon',
        'tag_title',
        'title',
        'title_highlight',
        'description',
        'background_image_url',
        'showcase_image_url',
        'image_alt',
        'badge_icon',
        'badge_title',
        'primary_button_text',
        'primary_button_url',
        'primary_button_icon',
        'secondary_button_text',
        'secondary_button_url',
        'secondary_button_icon',
        'trust_items',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'trust_items' => 'array',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_background')->singleFile();
        $this->addMediaCollection('hero_showcase')->singleFile();
    }

    public function getBackgroundImageSrcAttribute(): string
    {
        return $this->getFirstMediaUrl('hero_background')
            ?: ($this->background_image_url ?: 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1800&q=80');
    }

    public function getShowcaseImageSrcAttribute(): string
    {
        return $this->getFirstMediaUrl('hero_showcase')
            ?: ($this->showcase_image_url ?: $this->background_image_src);
    }
}
