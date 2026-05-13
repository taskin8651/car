@extends('layouts.admin')

@section('page-title', 'Show Specialization Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-specialization-cards.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Specialization Card Details
        </h2>

        <p class="admin-page-subtitle">
            Full details for this specialization card
        </p>
    </div>

    <div class="show-actions">
        @can('about_company_access')
            <a href="{{ route('admin.about-specialization-cards.edit', $aboutSpecializationCard->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Card
            </a>

            <form action="{{ route('admin.about-specialization-cards.destroy', $aboutSpecializationCard->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">

                <img src="{{ $aboutSpecializationCard->image_url }}"
                     alt="{{ $aboutSpecializationCard->image_alt ?? $aboutSpecializationCard->title }}"
                     style="width:100%; height:260px; object-fit:cover; border-radius:22px; border:1px solid #e5e7eb; margin-bottom:18px;">

                <p class="profile-title">
                    {{ $aboutSpecializationCard->title }}
                </p>

                <p class="profile-subtitle">
                    {{ $aboutSpecializationCard->image_alt ?? 'Specialization card image' }}
                </p>

                @if($aboutSpecializationCard->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Card ID</p>
                        <p class="stat-mini-value">#{{ $aboutSpecializationCard->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $aboutSpecializationCard->sort_order }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created Date</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($aboutSpecializationCard->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('about_company_access')
                    <a href="{{ route('admin.about-specialization-cards.edit', $aboutSpecializationCard->id) }}"
                       class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Card
                    </a>
                @endcan

                <a href="{{ route('admin.about-specialization-cards.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Cards
                </a>

                @can('about_company_access')
                    <a href="{{ route('admin.about-specialization-cards.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Card
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">
                    Card Details
                </p>
            </div>

            <div class="detail-section-body">

                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">
                        #{{ $aboutSpecializationCard->id }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">
                        {{ $aboutSpecializationCard->title }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>

                    <span class="detail-value">
                        @if($aboutSpecializationCard->icon)
                            <i class="{{ $aboutSpecializationCard->icon }}"></i>
                            {{ $aboutSpecializationCard->icon }}
                        @else
                            —
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {{ $aboutSpecializationCard->description ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Image Alt</span>
                    <span class="detail-value">
                        {{ $aboutSpecializationCard->image_alt ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value">
                        {{ $aboutSpecializationCard->sort_order }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($aboutSpecializationCard->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Active</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Inactive</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($aboutSpecializationCard->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($aboutSpecializationCard->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">
                    MediaLibrary Image
                </p>
            </div>

            <div class="detail-section-pad-sm">
                @if($aboutSpecializationCard->getFirstMediaUrl('specialization_card_image'))
                    <img src="{{ $aboutSpecializationCard->getFirstMediaUrl('specialization_card_image') }}"
                         alt="{{ $aboutSpecializationCard->image_alt ?? $aboutSpecializationCard->title }}"
                         style="width:100%; max-height:360px; object-fit:cover; border-radius:18px; border:1px solid #e5e7eb;">
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-image"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                        <p class="assign-empty-text">
                            Upload an image from edit page.
                        </p>

                        @can('about_company_access')
                            <a href="{{ route('admin.about-specialization-cards.edit', $aboutSpecializationCard->id) }}"
                               class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Upload Image
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection