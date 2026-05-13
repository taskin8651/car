@extends('layouts.admin')

@section('page-title', 'Service Cards')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Service Cards</h2>
        <p class="admin-page-subtitle">Manage services grid cards on the services page</p>
    </div>

    @can('service_card_access')
        <a href="{{ route('admin.service-cards.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Service Card
        </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $serviceCards->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $serviceCards->where('status', 1)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $serviceCards->where('status', 0)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">With Button</p>
        <p class="stat-value">{{ $serviceCards->filter(fn($item) => $item->button_url)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Service Cards</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Cards appear in services grid section
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ServiceCard">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Button</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($serviceCards as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td>
                            <div>
                                <p class="table-main-text">{{ $item->title }}</p>
                                <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($item->description, 55) }}</p>
                            </div>
                        </td>
                        <td>
                            @if($item->icon)
                                <span class="role-tag">
                                    <i class="{{ $item->icon }}"></i>
                                    {{ $item->icon }}
                                </span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="role-tag">{{ $item->button_text }}</span>
                        </td>
                        <td>{{ $item->sort_order }}</td>
                        <td>
                            @if($item->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('service_card_access')
                                    <a href="{{ route('admin.service-cards.show', $item->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                    <a href="{{ route('admin.service-cards.edit', $item->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.service-cards.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
