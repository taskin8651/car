@extends('layouts.admin')

@section('page-title', 'Company Intro Section')

@section('content')

@php
    $features = old('features', $aboutCompany->features ?? [
        'Luxury car collection',
        'Driver included',
        'Decoration support',
        'Fast booking enquiry',
    ]);
@endphp

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            Company Intro Section
        </h2>

        <p class="admin-page-subtitle">
            Update about page company introduction content
        </p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        Please check the form errors and try again.
    </div>
@endif

<form method="POST" action="{{ route('admin.about-companies.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- CONTENT SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <p class="form-card-title">Company Content</p>
                    <p class="form-card-subtitle">Main title, tag and description content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Section Tag Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="tag_title"
                               class="field-input"
                               value="{{ old('tag_title', $aboutCompany->tag_title) }}"
                               placeholder="Company Introduction">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Section Tag Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="tag_icon"
                               class="field-input"
                               value="{{ old('tag_icon', $aboutCompany->tag_icon) }}"
                               placeholder="bi bi-building-check">
                    </div>
                    <p class="field-hint">Example: bi bi-building-check, bi bi-gem</p>
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Title <span class="req">*</span>
                    </label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="title"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}"
                               value="{{ old('title', $aboutCompany->title) }}"
                               placeholder="Luxury Car Rental Service Built For Memorable Celebrations">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description One</label>
                    <textarea name="description_one"
                              rows="5"
                              class="field-input"
                              placeholder="Write first paragraph...">{{ old('description_one', $aboutCompany->description_one) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Description Two</label>
                    <textarea name="description_two"
                              rows="5"
                              class="field-input"
                              placeholder="Write second paragraph...">{{ old('description_two', $aboutCompany->description_two) }}</textarea>
                </div>

            </div>
        </div>

        {{-- IMAGE SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image & Badge</p>
                    <p class="form-card-subtitle">Company image and floating badge content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Section Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file"
                               name="image"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}"
                               accept="image/*">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">Upload only if you want to replace current image.</p>
                    @endif

                    @if($aboutCompany->getFirstMediaUrl('about_company_image'))
                        <div style="margin-top: 14px;">
                            <img src="{{ $aboutCompany->getFirstMediaUrl('about_company_image') }}"
                                 alt="{{ $aboutCompany->image_alt }}"
                                 style="width: 210px; height: 135px; object-fit: cover; border-radius: 18px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Image Alt Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>
                        <input type="text"
                               name="image_alt"
                               class="field-input"
                               value="{{ old('image_alt', $aboutCompany->image_alt) }}"
                               placeholder="Premium car rental business">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>
                        <input type="text"
                               name="badge_title"
                               class="field-input"
                               value="{{ old('badge_title', $aboutCompany->badge_title) }}"
                               placeholder="Premium Experience">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-gem icon"></i>
                        <input type="text"
                               name="badge_icon"
                               class="field-input"
                               value="{{ old('badge_icon', $aboutCompany->badge_icon) }}"
                               placeholder="bi bi-gem">
                    </div>
                </div>

            </div>
        </div>

        {{-- FEATURES SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Feature Points</p>
                    <p class="form-card-subtitle">Checklist points below company description</p>
                </div>
            </div>

            <div class="form-card-body">

                @for($i = 0; $i < 4; $i++)
                    <div class="field-group">
                        <label class="field-label">Feature {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check-circle icon"></i>
                            <input type="text"
                                   name="features[]"
                                   class="field-input"
                                   value="{{ $features[$i] ?? '' }}"
                                   placeholder="Enter feature point">
                        </div>
                    </div>
                @endfor

            </div>
        </div>

        {{-- PUBLISH SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

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
                        <input type="number"
                               name="sort_order"
                               class="field-input"
                               value="{{ old('sort_order', $aboutCompany->sort_order) }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $aboutCompany->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutCompany->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>

                    <p class="field-hint">
                        Active hone par ye section frontend about page me show hoga.
                    </p>
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