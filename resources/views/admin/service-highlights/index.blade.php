@extends('layouts.admin')

@section('page-title', 'Service Highlight Section')

@section('content')

@php
    $features = old('features', $serviceHighlight->features ?? [
        'Clean and event-ready cars',
        'Professional driver support',
        'Wedding decoration on request',
        'WhatsApp and call enquiry support',
    ]);
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Service Highlight Section</h2>
        <p class="admin-page-subtitle">Update services page image, badge and highlight content</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">Please check the form errors and try again.</div>
@endif

<form method="POST" action="{{ route('admin.service-highlights.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-star"></i></div>
                <div>
                    <p class="form-card-title">Highlight Content</p>
                    <p class="form-card-subtitle">Tag, title and description</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Tag Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="tag_title" class="field-input" value="{{ old('tag_title', $serviceHighlight->tag_title) }}" placeholder="Why Our Services">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tag Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text" name="tag_icon" class="field-input" value="{{ old('tag_icon', $serviceHighlight->tag_icon) }}" placeholder="bi bi-shield-check">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text" name="title" class="field-input {{ $errors->has('title') ? 'error' : '' }}" value="{{ old('title', $serviceHighlight->title) }}" required>
                    </div>
                    @if($errors->has('title'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description" rows="6" class="field-input">{{ old('description', $serviceHighlight->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-image"></i></div>
                <div>
                    <p class="form-card-title">Image & Badge</p>
                    <p class="form-card-subtitle">Highlight image and floating badge</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Section Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file" name="image" class="field-input {{ $errors->has('image') ? 'error' : '' }}" accept="image/*">
                    </div>
                    <p class="field-hint">Upload only if you want to replace current image.</p>

                    @if($serviceHighlight->getFirstMediaUrl('service_highlight_image'))
                        <div style="margin-top: 14px;">
                            <img src="{{ $serviceHighlight->getFirstMediaUrl('service_highlight_image') }}" alt="{{ $serviceHighlight->image_alt }}" style="width:210px; height:135px; object-fit:cover; border-radius:18px; border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Image Alt Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>
                        <input type="text" name="image_alt" class="field-input" value="{{ old('image_alt', $serviceHighlight->image_alt) }}" placeholder="Decorated wedding car service">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>
                        <input type="text" name="badge_title" class="field-input" value="{{ old('badge_title', $serviceHighlight->badge_title) }}" placeholder="Premium Wedding Entry">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-gem icon"></i>
                        <input type="text" name="badge_icon" class="field-input" value="{{ old('badge_icon', $serviceHighlight->badge_icon) }}" placeholder="bi bi-gem">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-list-check"></i></div>
                <div>
                    <p class="form-card-title">Feature Points</p>
                    <p class="form-card-subtitle">Checklist points beside highlight image</p>
                </div>
            </div>

            <div class="form-card-body">
                @for($i = 0; $i < 4; $i++)
                    <div class="field-group">
                        <label class="field-label">Feature {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text" name="features[]" class="field-input" value="{{ $features[$i] ?? '' }}" placeholder="Clean and event-ready cars">
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
                        <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $serviceHighlight->sort_order) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $serviceHighlight->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $serviceHighlight->status) ? 'checked' : '' }}>
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
