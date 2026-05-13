@extends('layouts.admin')

@section('page-title', 'Edit Gallery Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Gallery Item</h2>
        <p class="admin-page-subtitle">Update gallery photo details</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.gallery-items.update', $galleryItem) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.gallery-items._form')
    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
            <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
        </div>
        <button type="submit" form="delete-gallery-item-form" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete Item</button>
    </div>
</form>

<form id="delete-gallery-item-form" action="{{ route('admin.gallery-items.destroy', $galleryItem) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @method('DELETE')
    @csrf
</form>

@endsection
