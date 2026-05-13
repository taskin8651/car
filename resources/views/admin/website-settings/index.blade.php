@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Website Settings</h2>
        <p class="admin-page-subtitle">Manage common website contact, brand and social details</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">Please check the form errors and try again.</div>
@endif

<form method="POST" action="{{ route('admin.website-settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-building"></i></div>
                <div>
                    <p class="form-card-title">Brand Details</p>
                    <p class="form-card-subtitle">Website name and tagline</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Site Name <span class="req">*</span></label>
                    <input type="text" name="site_name" class="field-input {{ $errors->has('site_name') ? 'error' : '' }}" value="{{ old('site_name', $websiteSetting->site_name) }}" required>
                </div>

                <div class="field-group">
                    <label class="field-label">Tagline</label>
                    <input type="text" name="tagline" class="field-input" value="{{ old('tagline', $websiteSetting->tagline) }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-search"></i></div>
                <div>
                    <p class="form-card-title">SEO Details</p>
                    <p class="form-card-subtitle">Meta title, description and keywords</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Meta Title</label>
                    <input type="text" name="meta_title" class="field-input" value="{{ old('meta_title', $websiteSetting->meta_title) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Description</label>
                    <textarea name="meta_description" rows="4" class="field-input">{{ old('meta_description', $websiteSetting->meta_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="field-input">{{ old('meta_keywords', $websiteSetting->meta_keywords) }}</textarea>
                    <p class="field-hint">Comma separated keywords use kar sakte ho.</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-image"></i></div>
                <div>
                    <p class="form-card-title">Logo & Favicon</p>
                    <p class="form-card-subtitle">Upload image or use image URL fallback</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Logo URL</label>
                    <textarea name="logo_url" rows="3" class="field-input">{{ old('logo_url', $websiteSetting->logo_url) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Upload Logo</label>
                    <input type="file" name="logo" class="field-input" accept="image/*">
                    @if($websiteSetting->logo_src)
                        <div style="margin-top:14px;">
                            <img src="{{ $websiteSetting->logo_src }}" alt="{{ $websiteSetting->site_name }}" style="max-width:180px;max-height:90px;object-fit:contain;border-radius:12px;border:1px solid #e5e7eb;padding:10px;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">Favicon URL</label>
                    <textarea name="favicon_url" rows="3" class="field-input">{{ old('favicon_url', $websiteSetting->favicon_url) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Upload Favicon</label>
                    <input type="file" name="favicon" class="field-input" accept="image/*">
                    @if($websiteSetting->favicon_src)
                        <div style="margin-top:14px;">
                            <img src="{{ $websiteSetting->favicon_src }}" alt="Favicon" style="width:54px;height:54px;object-fit:contain;border-radius:12px;border:1px solid #e5e7eb;padding:8px;">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-phone"></i></div>
                <div>
                    <p class="form-card-title">Contact Details</p>
                    <p class="form-card-subtitle">Phone, WhatsApp and email</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Phone</label>
                    <input type="text" name="phone" class="field-input" value="{{ old('phone', $websiteSetting->phone) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Alternate Phone</label>
                    <input type="text" name="alternate_phone" class="field-input" value="{{ old('alternate_phone', $websiteSetting->alternate_phone) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="field-input" value="{{ old('whatsapp_number', $websiteSetting->whatsapp_number) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">WhatsApp URL</label>
                    <input type="text" name="whatsapp_url" class="field-input" value="{{ old('whatsapp_url', $websiteSetting->whatsapp_url) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Email</label>
                    <input type="email" name="email" class="field-input" value="{{ old('email', $websiteSetting->email) }}">
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <p class="form-card-title">Location Details</p>
                    <p class="form-card-subtitle">Address, hours and map embed</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Business Address</label>
                    <textarea name="business_address" rows="4" class="field-input">{{ old('business_address', $websiteSetting->business_address) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Opening Hours</label>
                    <input type="text" name="opening_hours" class="field-input" value="{{ old('opening_hours', $websiteSetting->opening_hours) }}">
                </div>

                <div class="field-group">
                    <label class="field-label">Google Map Embed URL</label>
                    <textarea name="google_map_embed_url" rows="4" class="field-input">{{ old('google_map_embed_url', $websiteSetting->google_map_embed_url) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-share-alt"></i></div>
                <div>
                    <p class="form-card-title">Social & Legal Links</p>
                    <p class="form-card-subtitle">Footer and contact page links</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'facebook_url' => 'Facebook URL',
                    'instagram_url' => 'Instagram URL',
                    'youtube_url' => 'YouTube URL',
                    'privacy_policy_url' => 'Privacy Policy URL',
                    'terms_url' => 'Terms URL',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}" class="field-input" value="{{ old($field, $websiteSetting->{$field}) }}">
                    </div>
                @endforeach
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
