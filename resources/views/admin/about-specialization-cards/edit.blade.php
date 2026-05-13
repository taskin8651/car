@extends('layouts.admin')

@section('page-title', 'Edit Specialization Card')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-specialization-cards.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Edit Specialization Card
        </h2>

        <p class="admin-page-subtitle">
            Update card information, image and publish settings
        </p>
    </div>

    <div class="identity-card">
        <div class="identity-avatar">
            <i class="fas fa-car"></i>
        </div>

        <div>
            <p class="identity-title">{{ $aboutSpecializationCard->title }}</p>
            <p class="identity-subtitle">ID #{{ $aboutSpecializationCard->id }}</p>
        </div>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.about-specialization-cards.update', $aboutSpecializationCard->id) }}"
      enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-car"></i>
                </div>

                <div>
                    <p class="form-card-title">Card Information</p>
                    <p class="form-card-subtitle">Update title, icon and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Card Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $aboutSpecializationCard->title) }}"
                               required
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon">
                        Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon"
                               id="icon"
                               value="{{ old('icon', $aboutSpecializationCard->icon) }}"
                               placeholder="bi bi-stars"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Example: bi bi-stars, bi bi-heart, bi bi-camera, bi bi-briefcase
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $aboutSpecializationCard->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Card Image</p>
                    <p class="form-card-subtitle">Replace image using MediaLibrary</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="image">
                        Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Upload only if you want to replace current image.
                        </p>
                    @endif

                    @if($aboutSpecializationCard->getFirstMediaUrl('specialization_card_image'))
                        <div style="margin-top: 14px;">
                            <img src="{{ $aboutSpecializationCard->getFirstMediaUrl('specialization_card_image') }}"
                                 alt="{{ $aboutSpecializationCard->image_alt }}"
                                 style="width:180px; height:120px; object-fit:cover; border-radius:16px; border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $aboutSpecializationCard->image_alt) }}"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image_alt'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image_alt') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

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
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $aboutSpecializationCard->sort_order) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="role-checkbox-item {{ old('status', $aboutSpecializationCard->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutSpecializationCard->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p class="meta-label">Card Info</p>

                    <div class="meta-grid-2">
                        <div>
                            <p class="meta-small-label">Created</p>
                            <p class="meta-value-strong">
                                {{ optional($aboutSpecializationCard->created_at)->format('d M Y') ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="meta-small-label">Updated</p>
                            <p class="meta-value-strong">
                                {{ optional($aboutSpecializationCard->updated_at)->format('d M Y') ?? '-' }}
                            </p>
                        </div>
                    </div>
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

            <a href="{{ route('admin.about-specialization-cards.index') }}" class="btn-ghost">
                {{ trans('global.cancel') }}
            </a>
        </div>

        @can('about_company_access')
            <button type="submit"
                    form="delete-specialization-card-form"
                    class="btn-danger">
                <i class="fas fa-trash-alt"></i>
                Delete Card
            </button>
        @endcan
    </div>
</form>

@can('about_company_access')
    <form id="delete-specialization-card-form"
          action="{{ route('admin.about-specialization-cards.destroy', $aboutSpecializationCard->id) }}"
          method="POST"
          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
        @method('DELETE')
        @csrf
    </form>
@endcan

@endsection