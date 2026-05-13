@extends('layouts.admin')

@section('page-title', 'Contact Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiries</h2>
        <p class="admin-page-subtitle">View enquiries submitted from the contact page</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total</p><p class="stat-value">{{ $contactEnquiries->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">New</p><p class="stat-value">{{ $contactEnquiries->where('status', 'new')->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Contacted</p><p class="stat-value">{{ $contactEnquiries->where('status', 'contacted')->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Closed</p><p class="stat-value">{{ $contactEnquiries->where('status', 'closed')->count() }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Enquiries</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Latest contact enquiries first</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Mobile</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactEnquiries as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td>
                            <p class="table-main-text">{{ $item->full_name }}</p>
                            <p class="table-sub-text">{{ $item->email ?: $item->pickup_location }}</p>
                        </td>
                        <td><a href="tel:{{ $item->mobile_number }}">{{ $item->mobile_number }}</a></td>
                        <td>{{ $item->event_type }}</td>
                        <td>{{ optional($item->event_date)->format('d M Y') ?: '-' }}</td>
                        <td><span class="role-tag">{{ ucfirst($item->status) }}</span></td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.contact-enquiries.show', $item) }}" class="btn-outline">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                <form action="{{ route('admin.contact-enquiries.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
