@extends('layouts.admin')

@section('page-title', 'Add Hero Slide')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home-hero-slides.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Hero Slide</h2>
        <p class="admin-page-subtitle">Create a new homepage carousel slide</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.home-hero-slides.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.home-hero-slides._form', ['homeHeroSlide' => new \App\Models\HomeHeroSlide()])
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
        <a href="{{ route('admin.home-hero-slides.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
