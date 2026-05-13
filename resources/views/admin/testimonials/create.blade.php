@extends('layouts.admin')

@section('page-title', 'Add Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Testimonial</h2>
        <p class="admin-page-subtitle">Create a new customer review</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.testimonials.store') }}">
    @csrf
    @include('admin.testimonials._form', ['testimonial' => new \App\Models\Testimonial()])
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
