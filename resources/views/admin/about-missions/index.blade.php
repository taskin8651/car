@extends('layouts.admin')

@section('page-title', 'Business Mission Section')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            Business Mission Section
        </h2>

        <p class="admin-page-subtitle">
            Update about page business mission content
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

<form method="POST" action="{{ route('admin.about-missions.update') }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- MISSION TAG --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Tag</p>
                    <p class="form-card-subtitle">Section badge text and icon</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Tag Title</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="tag_title"
                               class="field-input"
                               value="{{ old('tag_title', $aboutMission->tag_title) }}"
                               placeholder="Business Mission">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tag Icon</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>
                        <input type="text"
                               name="tag_icon"
                               class="field-input"
                               value="{{ old('tag_icon', $aboutMission->tag_icon) }}"
                               placeholder="bi bi-bullseye">
                    </div>

                    <p class="field-hint">
                        Example: bi bi-bullseye, fas fa-bullseye
                    </p>
                </div>

            </div>
        </div>

        {{-- MISSION CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">Mission Content</p>
                    <p class="form-card-subtitle">Title and mission description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="title"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}"
                               value="{{ old('title', $aboutMission->title) }}"
                               placeholder="To Make Every Wedding Entry Premium, Smooth & Royal">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>

                    <textarea name="description"
                              rows="6"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              placeholder="Our mission is to provide reliable luxury car rental services...">{{ old('description', $aboutMission->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- PUBLISH SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Publish Settings</p>
                    <p class="form-card-subtitle">Control visibility and order</p>
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
                               value="{{ old('sort_order', $aboutMission->sort_order) }}"
                               placeholder="0">
                    </div>
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $aboutMission->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutMission->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>

                    <p class="field-hint">
                        Active hone par ye mission frontend about page me show hoga.
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