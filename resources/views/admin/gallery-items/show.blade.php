@extends('layouts.admin')

@section('page-title', 'Show Gallery Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Gallery Item Details</h2>
        <p class="admin-page-subtitle">{{ $galleryItem->title }}</p>
    </div>
    <div class="show-actions">
        <a href="{{ route('admin.gallery-items.edit', $galleryItem) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <img src="{{ $galleryItem->image_src }}" alt="{{ $galleryItem->image_alt ?? $galleryItem->title }}" style="width:100%;height:280px;object-fit:cover;border-radius:22px;border:1px solid #e5e7eb;margin-bottom:18px;">
                <p class="profile-title">{{ $galleryItem->title }}</p>
                <p class="profile-subtitle">{{ $galleryItem->category }}</p>
            </div>
        </div>
    </div>
    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-images"></i></div>
                <p class="detail-section-title">Gallery Details</p>
            </div>
            <div class="detail-section-body">
                @foreach(['ID' => '#'.$galleryItem->id, 'Title' => $galleryItem->title, 'Category' => $galleryItem->category, 'Card Size' => $galleryItem->card_size ?: '-', 'Status' => $galleryItem->status ? 'Active' : 'Inactive', 'Sort Order' => $galleryItem->sort_order] as $label => $value)
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
