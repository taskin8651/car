@extends('layouts.admin')

@section('page-title', 'Add Gallery Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Gallery Item</h2>
        <p class="admin-page-subtitle">Create a new gallery photo</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.gallery-items.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.gallery-items._form', ['galleryItem' => new \App\Models\GalleryItem()])
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
        <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
