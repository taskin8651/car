@extends('layouts.admin')

@section('page-title', 'Edit Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-back-link"><- {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Testimonial</h2>
        <p class="admin-page-subtitle">{{ $testimonial->client_name }}</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}">
    @csrf
    @method('PUT')
    @include('admin.testimonials._form')
    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary"><i class="fas fa-save"></i> {{ trans('global.save') }}</button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
        </div>
        <button type="submit" form="delete-testimonial-form" class="btn-danger"><i class="fas fa-trash-alt"></i> Delete Testimonial</button>
    </div>
</form>

<form id="delete-testimonial-form" action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
    @method('DELETE')
    @csrf
</form>

@endsection
