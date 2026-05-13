@extends('layouts.admin')

@section('page-title', 'Show Service Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-cards.index') }}" class="admin-back-link">
            <- {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Service Card Details</h2>
        <p class="admin-page-subtitle">Full details for this service card</p>
    </div>

    <div class="show-actions">
        @can('service_card_access')
            <a href="{{ route('admin.service-cards.edit', $serviceCard->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Card
            </a>
            <form action="{{ route('admin.service-cards.destroy', $serviceCard->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                <div class="identity-avatar" style="margin:0 auto 18px;">
                    @if($serviceCard->icon)
                        <i class="{{ $serviceCard->icon }}"></i>
                    @else
                        <i class="fas fa-th-large"></i>
                    @endif
                </div>

                <p class="profile-title">{{ $serviceCard->title }}</p>
                <p class="profile-subtitle">{{ $serviceCard->button_text }}</p>

                @if($serviceCard->status)
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
                        <p class="stat-mini-value">#{{ $serviceCard->id }}</p>
                    </div>
                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $serviceCard->sort_order }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>
            <div class="quick-list">
                @can('service_card_access')
                    <a href="{{ route('admin.service-cards.edit', $serviceCard->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Card
                    </a>
                @endcan
                <a href="{{ route('admin.service-cards.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Cards
                </a>
                @can('service_card_access')
                    <a href="{{ route('admin.service-cards.create') }}" class="quick-link">
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
                <div class="detail-section-icon"><i class="fas fa-id-card"></i></div>
                <p class="detail-section-title">Card Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $serviceCard->id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $serviceCard->title }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        @if($serviceCard->icon)
                            <i class="{{ $serviceCard->icon }}"></i>
                            {{ $serviceCard->icon }}
                        @else
                            -
                        @endif
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $serviceCard->description ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Button Text</span>
                    <span class="detail-value">{{ $serviceCard->button_text }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Button URL</span>
                    <span class="detail-value">{{ $serviceCard->button_url }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">{{ $serviceCard->status ? 'Active' : 'Inactive' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">{{ optional($serviceCard->created_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">{{ optional($serviceCard->updated_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
