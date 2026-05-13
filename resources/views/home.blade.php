@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('styles')
<style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }
    .dash-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .04);
    }
    .dash-card-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 14px;
    }
    .dash-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
    .dash-label {
        margin: 0 0 8px;
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
    }
    .dash-value {
        margin: 0;
        color: #0f172a;
        font-size: 30px;
        line-height: 1;
        font-weight: 800;
    }
    .dash-note {
        display: inline-flex;
        margin-top: 12px;
        padding: 5px 10px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
    }
    .dashboard-layout {
        display: grid;
        grid-template-columns: 1.55fr .95fr;
        gap: 18px;
        margin-bottom: 20px;
    }
    .dashboard-table {
        width: 100%;
        border-collapse: collapse;
    }
    .dashboard-table th {
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        padding: 12px 14px;
        border-bottom: 1px solid #e5e7eb;
    }
    .dashboard-table td {
        padding: 14px;
        color: #334155;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    .dashboard-table tr:last-child td {
        border-bottom: 0;
    }
    .status-chip {
        display: inline-flex;
        padding: 4px 10px;
        border-radius: 999px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 800;
        text-transform: capitalize;
    }
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
    }
    .quick-action {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 16px;
        border-radius: 14px;
        background: #f8fafc;
        color: #0f172a;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
        border: 1px solid #e5e7eb;
    }
    .quick-action:hover {
        color: #0f172a;
        background: #eef2ff;
    }
    @media(max-width: 1100px) {
        .dashboard-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .dashboard-layout { grid-template-columns: 1fr; }
    }
    @media(max-width: 640px) {
        .dashboard-grid, .quick-actions { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Dashboard</h2>
        <p class="admin-page-subtitle">Enquiries, bookings and website content summary</p>
    </div>
    <div class="show-actions">
        <a href="{{ url('/') }}" target="_blank" class="btn-outline"><i class="fas fa-external-link-alt"></i> View Website</a>
    </div>
</div>

<div class="dashboard-grid">
    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-label">Car Enquiries</p>
                <p class="dash-value">{{ $stats['carEnquiriesTotal'] }}</p>
                <span class="dash-note">{{ $stats['carEnquiriesNew'] }} new</span>
            </div>
            <div class="dash-icon" style="background:#eef2ff;color:#4f46e5;"><i class="fas fa-car-side"></i></div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-label">Booking Enquiries</p>
                <p class="dash-value">{{ $stats['bookingEnquiriesTotal'] }}</p>
                <span class="dash-note">{{ $stats['bookingEnquiriesNew'] }} new</span>
            </div>
            <div class="dash-icon" style="background:#ecfdf5;color:#059669;"><i class="fas fa-clipboard-list"></i></div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-label">Contact Enquiries</p>
                <p class="dash-value">{{ $stats['contactEnquiriesTotal'] }}</p>
                <span class="dash-note">{{ $stats['contactEnquiriesNew'] }} new</span>
            </div>
            <div class="dash-icon" style="background:#fff7ed;color:#ea580c;"><i class="fas fa-envelope-open-text"></i></div>
        </div>
    </div>

    <div class="dash-card">
        <div class="dash-card-head">
            <div>
                <p class="dash-label">Active Cars</p>
                <p class="dash-value">{{ $stats['carsActive'] }}</p>
                <span class="dash-note">{{ $stats['carsTotal'] }} total cars</span>
            </div>
            <div class="dash-icon" style="background:#fef2f2;color:#dc2626;"><i class="fas fa-car"></i></div>
        </div>
    </div>
</div>

<div class="dashboard-layout">
    <div class="dash-card">
        <div class="page-card-header" style="padding:0 0 14px;border:0;">
            <p class="page-card-title">Recent Enquiries</p>
            <span class="page-card-note"><i class="fas fa-clock"></i> Latest activity first</span>
        </div>

        <div style="overflow-x:auto;">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Customer</th>
                        <th>Event</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentEnquiries as $item)
                        <tr>
                            <td>{{ $item['type'] }}</td>
                            <td>
                                <strong>{{ $item['name'] }}</strong><br>
                                <span style="color:#64748b;">{{ $item['phone'] }}</span>
                            </td>
                            <td>{{ $item['event'] ?: '-' }}</td>
                            <td><span class="status-chip">{{ $item['status'] }}</span></td>
                            <td>{{ optional($item['created_at'])->format('d M Y') }}</td>
                            <td style="text-align:right;">
                                <a href="{{ $item['url'] }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;color:#64748b;padding:28px;">No enquiries yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="dash-card">
        <div class="page-card-header" style="padding:0 0 14px;border:0;">
            <p class="page-card-title">Content Summary</p>
            <span class="page-card-note"><i class="fas fa-layer-group"></i> Website data</span>
        </div>

        @foreach([
            ['Cars', $stats['carsTotal'], 'fas fa-car', route('admin.cars.index')],
            ['Services', $stats['servicesTotal'], 'fas fa-concierge-bell', route('admin.service-cards.index')],
            ['Gallery Items', $stats['galleryTotal'], 'fas fa-images', route('admin.gallery-items.index')],
            ['Testimonials', $stats['testimonialsTotal'], 'fas fa-comment-dots', route('admin.testimonials.index')],
        ] as [$label, $count, $icon, $url])
            <a href="{{ $url }}" style="display:flex;align-items:center;justify-content:space-between;text-decoration:none;color:#0f172a;padding:13px 0;border-bottom:1px solid #f1f5f9;">
                <span style="display:flex;align-items:center;gap:10px;font-weight:800;font-size:13px;">
                    <i class="{{ $icon }}" style="color:#64748b;width:18px;"></i>
                    {{ $label }}
                </span>
                <strong>{{ $count }}</strong>
            </a>
        @endforeach
    </div>
</div>

<div class="dash-card">
    <div class="page-card-header" style="padding:0 0 14px;border:0;">
        <p class="page-card-title">Quick Actions</p>
        <span class="page-card-note"><i class="fas fa-bolt"></i> Important admin pages</span>
    </div>

    <div class="quick-actions">
        <a href="{{ route('admin.car-enquiries.index') }}" class="quick-action"><i class="fas fa-car-side"></i> Car Enquiries</a>
        <a href="{{ route('admin.booking-enquiries.index') }}" class="quick-action"><i class="fas fa-clipboard-list"></i> Booking Enquiries</a>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="quick-action"><i class="fas fa-envelope-open-text"></i> Contact Enquiries</a>
        <a href="{{ route('admin.cars.create') }}" class="quick-action"><i class="fas fa-plus"></i> Add Car</a>
        <a href="{{ route('admin.gallery-items.create') }}" class="quick-action"><i class="fas fa-image"></i> Add Gallery</a>
        <a href="{{ route('admin.website-settings.index') }}" class="quick-action"><i class="fas fa-cog"></i> Website Settings</a>
    </div>
</div>

@endsection
