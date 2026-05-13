@extends('layouts.admin')

@section('page-title', 'Show Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Testimonial Details</h2>
        <p class="admin-page-subtitle">{{ $testimonial->client_name }}</p>
    </div>
    <div class="show-actions">
        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card">
            <div class="profile-hero">
                <div class="user-avatar" style="margin:0 auto 18px;">{{ $testimonial->avatar_text ?: strtoupper(substr($testimonial->client_name, 0, 1)) }}</div>
                <p class="profile-title">{{ $testimonial->client_name }}</p>
                <p class="profile-subtitle">{{ $testimonial->event_type }}</p>
                <p style="margin-top:18px;">{{ $testimonial->message }}</p>
            </div>
        </div>
    </div>
    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-star"></i></div>
                <p class="detail-section-title">Review Details</p>
            </div>
            <div class="detail-section-body">
                @foreach(['ID' => '#'.$testimonial->id, 'Rating' => $testimonial->rating.'/5', 'Avatar Text' => $testimonial->avatar_text ?: '-', 'Status' => $testimonial->status ? 'Active' : 'Inactive', 'Sort Order' => $testimonial->sort_order] as $label => $value)
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
