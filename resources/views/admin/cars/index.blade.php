@extends('layouts.admin')

@section('page-title', 'Cars')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Cars</h2>
        <p class="admin-page-subtitle">Manage frontend car listing and detail pages</p>
    </div>

    @can('car_create')
        <a href="{{ route('admin.cars.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Car</a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total Cars</p><p class="stat-value">{{ $cars->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Active</p><p class="stat-value">{{ $cars->where('is_active', 1)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Inactive</p><p class="stat-value">{{ $cars->where('is_active', 0)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Available</p><p class="stat-value">{{ $cars->where('status_class', 'available')->count() }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Cars</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Cars appear on frontend listing page</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Car">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td><img src="{{ $item->main_image_url }}" alt="{{ $item->image_alt ?? $item->name }}" style="width:70px;height:52px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;"></td>
                        <td>
                            <p class="table-main-text">{{ $item->name }}</p>
                            <p class="table-sub-text">{{ $item->brand }} {{ $item->model }}</p>
                        </td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->price_text }}</td>
                        <td>
                            @if($item->is_active)
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px;color:#166534;">Active</span></div>
                            @else
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px;color:#92400E;">Inactive</span></div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('car_show')
                                    <a href="{{ route('admin.cars.show', $item) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                @endcan
                                @can('car_edit')
                                    <a href="{{ route('admin.cars.edit', $item) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                @endcan
                                @can('car_delete')
                                    <form action="{{ route('admin.cars.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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
