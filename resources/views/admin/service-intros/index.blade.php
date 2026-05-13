@extends('layouts.admin')

@section('page-title', 'Services Intro Section')

@section('content')

@php
    $pills = old('pills', $serviceIntro->pills ?? [
        'Driver Included',
        'Decoration Available',
        'Wedding/Event Ready',
        'Quick Enquiry Support',
    ]);
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Services Intro Section</h2>
        <p class="admin-page-subtitle">Update services page intro content and pills</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">Please check the form errors and try again.</div>
@endif

<form method="POST" action="{{ route('admin.service-intros.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-info-circle"></i></div>
                <div>
                    <p class="form-card-title">Intro Content</p>
                    <p class="form-card-subtitle">Tag, title and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Tag Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="tag_title" class="field-input" value="{{ old('tag_title', $serviceIntro->tag_title) }}" placeholder="What We Offer">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tag Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="tag_icon" class="field-input" value="{{ old('tag_icon', $serviceIntro->tag_icon) }}" placeholder="bi bi-info-circle">
                    </div>
                    <p class="field-hint">Example: bi bi-info-circle, bi bi-grid</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" class="field-input {{ $errors->has('title') ? 'error' : '' }}" value="{{ old('title', $serviceIntro->title) }}" required>
                    </div>
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="6" class="field-input">{{ old('description', $serviceIntro->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-list-check"></i></div>
                <div>
                    <p class="form-card-title">Intro Pills</p>
                    <p class="form-card-subtitle">Small feature labels below description</p>
                </div>
            </div>

            <div class="form-card-body">
                @for($i = 0; $i < 4; $i++)
                    <div class="field-group">
                        <label class="field-label">Pill {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text" name="pills[]" class="field-input" value="{{ $pills[$i] ?? '' }}" placeholder="Driver Included">
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
                <div>
                    <p class="form-card-title">Publish Settings</p>
                    <p class="form-card-subtitle">Control visibility and ordering</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $serviceIntro->sort_order) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $serviceIntro->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $serviceIntro->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                    <p class="field-hint">Active hone par ye section frontend services page me show hoga.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i>
            {{ trans('global.save') }}
        </button>
    </div>
</form>

@endsection
