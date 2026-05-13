@extends('layouts.admin')

@section('page-title', 'Show Booking Enquiry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.booking-enquiries.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Booking Enquiry Details</h2>
        <p class="admin-page-subtitle">Submitted enquiry from booking page</p>
    </div>

    <div class="show-actions">
        <form action="{{ route('admin.booking-enquiries.destroy', $bookingEnquiry) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                <p class="profile-title">{{ $bookingEnquiry->customer_name }}</p>
                <p class="profile-subtitle">{{ $bookingEnquiry->mobile_number }}</p>
                <span class="status-pill success">
                    <i class="fas fa-circle"></i>
                    {{ ucfirst($bookingEnquiry->status) }}
                </span>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Update Status</p>
            <form method="POST" action="{{ route('admin.booking-enquiries.update', $bookingEnquiry) }}">
                @csrf
                @method('PUT')
                <div class="field-group">
                    <select name="status" class="field-input">
                        @foreach(['new', 'viewed', 'contacted', 'closed'] as $status)
                            <option value="{{ $status }}" {{ $bookingEnquiry->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
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
                <div class="detail-section-icon"><i class="fas fa-clipboard-list"></i></div>
                <p class="detail-section-title">Booking Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'Customer Name' => $bookingEnquiry->customer_name,
                    'Mobile Number' => $bookingEnquiry->mobile_number,
                    'Email' => $bookingEnquiry->email,
                    'Event Type' => $bookingEnquiry->event_type,
                    'Event Date' => optional($bookingEnquiry->event_date)->format('d M Y'),
                    'Event Time' => $bookingEnquiry->event_time,
                    'Pickup Location' => $bookingEnquiry->pickup_location,
                    'Drop Location' => $bookingEnquiry->drop_location,
                    'Preferred Car' => $bookingEnquiry->preferred_car,
                    'Decoration Required' => $bookingEnquiry->decoration_required,
                    'Submitted At' => optional($bookingEnquiry->created_at)->format('d M Y, H:i'),
                ] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value ?? '-' }}</span>
                    </div>
                @endforeach

                <div class="detail-row">
                    <span class="detail-label">Message</span>
                    <span class="detail-value">{{ $bookingEnquiry->message ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
