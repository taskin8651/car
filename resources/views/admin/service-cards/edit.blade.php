@extends('layouts.admin')

@section('page-title', 'Edit Service Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-cards.index') }}" class="admin-back-link">
            <- {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Edit Service Card</h2>
        <p class="admin-page-subtitle">Update service card content and publish settings</p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar"><i class="fas fa-th-large"></i></div>
        <div>
            <p class="identity-title">{{ $serviceCard->title }}</p>
            <p class="identity-subtitle">ID #{{ $serviceCard->id }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-cards.update', $serviceCard->id) }}">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-th-large"></i></div>
                <div>
                    <p class="form-card-title">Card Information</p>
                    <p class="form-card-subtitle">Update title, icon and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Card Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" id="title" value="{{ old('title', $serviceCard->title) }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon">Icon Class</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $serviceCard->icon) }}" placeholder="bi bi-stars" class="field-input">
                    </div>
                    <p class="field-hint">Example: bi bi-stars, bi bi-heart, bi bi-camera, bi bi-briefcase</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="6" class="field-input">{{ old('description', $serviceCard->description) }}</textarea>
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
                        <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $serviceCard->button_text) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_url">Button URL</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text" name="button_url" id="button_url" value="{{ old('button_url', $serviceCard->button_url) }}" class="field-input">
                    </div>
                </div>
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
                    <label class="field-label" for="sort_order">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $serviceCard->sort_order) }}" class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $serviceCard->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $serviceCard->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions-between">
        <div class="form-actions-left">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.service-cards.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
        </div>

        @can('service_card_access')
            <button type="submit" form="delete-service-card-form" class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Card
            </button>
        @endcan
    </div>
</form>

@can('service_card_access')
    <form id="delete-service-card-form" action="{{ route('admin.service-cards.destroy', $serviceCard->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection
