@extends('layouts.admin')

@section('page-title', 'Gallery Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery Items</h2>
        <p class="admin-page-subtitle">Manage frontend gallery photos and categories</p>
    </div>

    @can('gallery_item_access')
        <a href="{{ route('admin.gallery-items.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Gallery Item</a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Items</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Active items appear on gallery page</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-GalleryItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Status</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleryItems as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td><img src="{{ $item->image_src }}" alt="{{ $item->image_alt ?? $item->title }}" style="width:70px;height:52px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;"></td>
                        <td><p class="table-main-text">{{ $item->title }}</p></td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->card_size ?: '-' }}</td>
                        <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="action-row">
                                <a href="{{ route('admin.gallery-items.show', $item) }}" class="btn-outline"><i class="fas fa-eye"></i> View</a>
                                <a href="{{ route('admin.gallery-items.edit', $item) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <form action="{{ route('admin.gallery-items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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
