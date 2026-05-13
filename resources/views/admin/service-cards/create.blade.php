@extends('layouts.admin')

@section('page-title', 'Add Service Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-cards.index') }}" class="admin-back-link">
            <- {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Add Service Card</h2>
        <p class="admin-page-subtitle">Create a new service card for the services grid</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-cards.store') }}">
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-th-large"></i></div>
                <div>
                    <p class="form-card-title">Card Information</p>
                    <p class="form-card-subtitle">Title, icon and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Card Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Luxury Car For Groom Entry" class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', 'bi bi-stars') }}" placeholder="bi bi-stars" class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>
                    <p class="field-hint">Example: bi bi-stars, bi bi-heart, bi bi-camera, bi bi-briefcase</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="6" placeholder="Royal luxury car service for groom entry." class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-link"></i></div>
                <div>
                    <p class="form-card-title">Button Settings</p>
                    <p class="form-card-subtitle">CTA text and target URL</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="button_text">Button Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>
                        <input type="text" name="button_text" id="button_text" value="{{ old('button_text', 'Enquire Now') }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_url">Button URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="button_url" id="button_url" value="{{ old('button_url', 'booking-enquiry.html') }}" class="field-input">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
                <div>
                    <p class="form-card-title">Publish Settings</p>
                    <p class="form-card-subtitle">Control card visibility and order</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', 1) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', 1) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                    <p class="field-hint">Active hone par card frontend services page me show hoga.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.service-cards.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
