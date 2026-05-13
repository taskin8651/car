@extends('layouts.admin')

@section('page-title', 'Show Contact Enquiry')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Contact Enquiry Details</h2>
        <p class="admin-page-subtitle">Submitted enquiry from contact page</p>
    </div>

    <div class="show-actions">
        <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
                <p class="profile-title">{{ $contactEnquiry->full_name }}</p>
                <p class="profile-subtitle">{{ $contactEnquiry->mobile_number }}</p>
                <span class="status-pill success">
                    <i class="fas fa-circle"></i>
                    {{ ucfirst($contactEnquiry->status) }}
                </span>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Update Status</p>
            <form method="POST" action="{{ route('admin.contact-enquiries.update', $contactEnquiry) }}">
                @csrf
                @method('PUT')
                <div class="field-group">
                    <select name="status" class="field-input">
                        @foreach(['new', 'viewed', 'contacted', 'closed'] as $status)
                            <option value="{{ $status }}" {{ $contactEnquiry->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
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
                <div class="detail-section-icon"><i class="fas fa-envelope-open-text"></i></div>
                <p class="detail-section-title">Contact Information</p>
            </div>

            <div class="detail-section-body">
                @foreach([
                    'Full Name' => $contactEnquiry->full_name,
                    'Mobile Number' => $contactEnquiry->mobile_number,
                    'Email' => $contactEnquiry->email,
                    'Event Type' => $contactEnquiry->event_type,
                    'Event Date' => optional($contactEnquiry->event_date)->format('d M Y'),
                    'Preferred Car' => $contactEnquiry->preferred_car,
                    'Pickup Location' => $contactEnquiry->pickup_location,
                    'Decoration Required' => $contactEnquiry->decoration_required,
                    'Submitted At' => optional($contactEnquiry->created_at)->format('d M Y, H:i'),
                ] as $label => $value)
                    <div class="detail-row">
                        <span class="detail-label">{{ $label }}</span>
                        <span class="detail-value">{{ $value ?? '-' }}</span>
                    </div>
                @endforeach

                <div class="detail-row">
                    <span class="detail-label">Message</span>
                    <span class="detail-value">{{ $contactEnquiry->message ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
