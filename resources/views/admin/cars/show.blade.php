@extends('layouts.admin')

@section('page-title', 'Show Car')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.cars.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Car Details</h2>
        <p class="admin-page-subtitle">Full details for this car</p>
    </div>

    <div class="show-actions">
        @can('car_edit')
            <a href="{{ route('admin.cars.edit', $car) }}" class="btn-primary"><i class="fas fa-pencil-alt"></i> Edit Car</a>
        @endcan
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <img src="{{ $car->main_image_url }}" alt="{{ $car->image_alt ?? $car->name }}" style="width:100%;height:260px;object-fit:cover;border-radius:22px;border:1px solid #e5e7eb;margin-bottom:18px;">
                <p class="profile-title">{{ $car->name }}</p>
                <p class="profile-subtitle">{{ $car->category }} | {{ $car->price_text }}</p>
                <span class="status-pill {{ $car->is_active ? 'success' : 'warning' }}">
                    <i class="fas fa-check-circle"></i>
                    {{ $car->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-car-side"></i></div>
                <p class="detail-section-title">Car Information</p>
            </div>
            <div class="detail-section-body">
                @foreach(['ID' => '#'.$car->id, 'Name' => $car->name, 'Slug' => $car->slug, 'Brand' => $car->brand, 'Model' => $car->model, 'Category' => $car->category, 'Color' => $car->color, 'Seating' => $car->seating, 'Decoration' => $car->decoration, 'Driver' => $car->driver, 'Price' => $car->price_text] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value ?? '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
