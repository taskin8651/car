@extends('layouts.admin')

@section('page-title', 'Specialization Cards')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            Specialization Cards
        </h2>

        <p class="admin-page-subtitle">
            Manage wedding and event specialization cards
        </p>
    </div>

    @can('about_company_access')
        <a href="{{ route('admin.about-specialization-cards.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Specialization Card
        </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $aboutSpecializationCards->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $aboutSpecializationCards->where('status', 1)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $aboutSpecializationCards->where('status', 0)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">With Image</p>
        <p class="stat-value">
            {{ $aboutSpecializationCards->filter(fn($item) => $item->getFirstMediaUrl('specialization_card_image'))->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">
            All Specialization Cards
        </p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Cards appear on about page specialization section
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AboutSpecializationCard">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($aboutSpecializationCards as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $item->id }}</span>
                        </td>

                        <td>
                            <img src="{{ $item->image_url }}"
                                 alt="{{ $item->image_alt ?? $item->title }}"
                                 style="width:70px; height:52px; object-fit:cover; border-radius:12px; border:1px solid #e5e7eb;">
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $item->title }}</p>
                                <p class="table-sub-text">
                                    {{ \Illuminate\Support\Str::limit($item->description, 45) }}
                                </p>
                            </div>
                        </td>

                        <td>
                            @if($item->icon)
                                <span class="role-tag">
                                    <i class="{{ $item->icon }}"></i>
                                    {{ $item->icon }}
                                </span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            {{ $item->sort_order }}
                        </td>

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
                                @can('about_company_access')
                                    <a href="{{ route('admin.about-specialization-cards.show', $item->id) }}"
                                       class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>

                                    <a href="{{ route('admin.about-specialization-cards.edit', $item->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.about-specialization-cards.destroy', $item->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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