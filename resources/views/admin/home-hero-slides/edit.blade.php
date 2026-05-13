@extends('layouts.admin')

@section('page-title', 'Edit Hero Slide')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home-hero-slides.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Hero Slide</h2>
        <p class="admin-page-subtitle">{{ $homeHeroSlide->title }}</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.home-hero-slides.update', $homeHeroSlide) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.home-hero-slides._form')
    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
            <a href="{{ route('admin.home-hero-slides.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
        </div>
        <button type="submit" form="delete-home-hero-slide-form" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete Slide</button>
    </div>
</form>

<form id="delete-home-hero-slide-form" action="{{ route('admin.home-hero-slides.destroy', $homeHeroSlide) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @method('DELETE')
    @csrf
</form>

@endsection
