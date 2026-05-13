@extends('layouts.admin')

@section('page-title', 'Show Car Enquiry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.car-enquiries.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Car Enquiry Details</h2>
        <p class="admin-page-subtitle">Submitted enquiry for {{ $carEnquiry->car->name ?? 'car' }}</p>
    </div>

    <div class="show-actions">
        <form action="{{ route('admin.car-enquiries.destroy', $carEnquiry) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <p class="profile-title">{{ $carEnquiry->name }}</p>
                <p class="profile-subtitle">{{ $carEnquiry->mobile }}</p>
                <span class="status-pill success">
                    <i class="fas fa-circle"></i>
                    {{ ucfirst($carEnquiry->status) }}
                </span>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Update Status</p>
            <form method="POST" action="{{ route('admin.car-enquiries.update', $carEnquiry) }}">
                @csrf
                @method('PUT')
                <div class="field-group">
                    <select name="status" class="field-input">
                        @foreach(['new', 'viewed', 'contacted', 'closed'] as $status)
                            <option value="{{ $status }}" {{ $carEnquiry->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Save Status</button>
            </form>
        </div>
    </div>

    <div>
        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon"><i class="fas fa-calendar-check"></i></div>
                <p class="detail-section-title">Enquiry Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'Car' => $carEnquiry->car->name ?? '-',
                    'Name' => $carEnquiry->name,
                    'Mobile' => $carEnquiry->mobile,
                    'Event Type' => $carEnquiry->event_type,
                    'Event Date' => optional($carEnquiry->event_date)->format('d M Y'),
                    'Pickup Location' => $carEnquiry->pickup_location,
                    'Decoration Required' => $carEnquiry->decoration_required,
                    'Submitted At' => optional($carEnquiry->created_at)->format('d M Y, H:i'),
                ] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value ?? '-' }}</span>
                    </div>
                @endforeach

                <div class="detail-row">
                    <span class="detail-label">Message</span>
                    <span class="detail-value">{{ $carEnquiry->message ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
