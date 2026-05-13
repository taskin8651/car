@extends('layouts.admin')

@section('page-title', 'Booking Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Booking Enquiries</h2>
        <p class="admin-page-subtitle">View enquiries submitted from the booking enquiry page</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total</p><p class="stat-value">{{ $bookingEnquiries->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">New</p><p class="stat-value">{{ $bookingEnquiries->where('status', 'new')->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Contacted</p><p class="stat-value">{{ $bookingEnquiries->where('status', 'contacted')->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Closed</p><p class="stat-value">{{ $bookingEnquiries->where('status', 'closed')->count() }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Booking Enquiries</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Latest booking enquiries first</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-BookingEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Mobile</th>
                    <th>Preferred Car</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookingEnquiries as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $item->customer_name }}</p>
                            <p class="table-sub-text">{{ $item->pickup_location }}</p>
                        </td>
                        <td><a href="tel:{{ $item->mobile_number }}">{{ $item->mobile_number }}</a></td>
                        <td>{{ $item->preferred_car }}</td>
                        <td>{{ $item->event_type }}</td>
                        <td>{{ optional($item->event_date)->format('d M Y') }}</td>
                        <td><span class="role-tag">{{ ucfirst($item->status) }}</span></td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.booking-enquiries.show', $item) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <form action="{{ route('admin.booking-enquiries.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-outline btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
