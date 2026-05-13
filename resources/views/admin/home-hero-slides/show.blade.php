@extends('layouts.admin')

@section('page-title', 'Show Hero Slide')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home-hero-slides.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Hero Slide Details</h2>
        <p class="admin-page-subtitle">{{ $homeHeroSlide->title }}</p>
    </div>
    <div class="show-actions">
        <a href="{{ route('admin.home-hero-slides.edit', $homeHeroSlide) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <img src="{{ $homeHeroSlide->background_image_src }}" alt="{{ $homeHeroSlide->image_alt }}" style="width:100%;height:280px;object-fit:cover;border-radius:22px;border:1px solid #e5e7eb;margin-bottom:18px;">
            <p class="profile-title">{{ $homeHeroSlide->title }} {{ $homeHeroSlide->title_highlight }}</p>
            <p class="profile-subtitle">{{ $homeHeroSlide->description }}</p>
        </div>
    </div>
    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-images"></i></div>
                <p class="detail-section-title">Slide Details</p>
            </div>
            <div class="detail-section-body">
                @foreach(['ID' => '#'.$homeHeroSlide->id, 'Tag' => $homeHeroSlide->tag_title, 'Badge' => $homeHeroSlide->badge_title ?: '-', 'Primary Button' => $homeHeroSlide->primary_button_text ?: '-', 'Secondary Button' => $homeHeroSlide->secondary_button_text ?: '-', 'Status' => $homeHeroSlide->status ? 'Active' : 'Inactive', 'Sort Order' => $homeHeroSlide->sort_order] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
