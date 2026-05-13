<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-images"></i></div>
            <div>
                <p class="form-card-title">Gallery Content</p>
                <p class="form-card-subtitle">Title, category and layout size</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Title <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>
                    <input type="text" name="title" class="field-input {{ $errors->has('title') ? 'error' : '' }}" value="{{ old('title', $galleryItem->title ?? '') }}" required placeholder="Premium Wedding Fleet">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Category <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>
                    <input type="text" name="category" class="field-input {{ $errors->has('category') ? 'error' : '' }}" value="{{ old('category', $galleryItem->category ?? '') }}" required placeholder="Luxury Cars">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Card Size Class</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-ruler-combined icon"></i>
                    <input type="text" name="card_size" class="field-input" value="{{ old('card_size', $galleryItem->card_size ?? '') }}" placeholder="small or tall">
                </div>
                <p class="field-hint">Use blank, small, or tall to match frontend card design.</p>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-image"></i></div>
            <div>
                <p class="form-card-title">Image</p>
                <p class="form-card-subtitle">Upload image or provide URL fallback</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Image URL</label>
                <textarea name="image_url" rows="4" class="field-input">{{ old('image_url', $galleryItem->image_url ?? '') }}</textarea>
            </div>

            <div class="field-group">
                <label class="field-label">Upload Image</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-image icon"></i>
                    <input type="file" name="image" class="field-input" accept="image/*">
                </div>
                @if(isset($galleryItem) && $galleryItem->getFirstMediaUrl('gallery_image'))
                    <div style="margin-top:14px;">
                        <img src="{{ $galleryItem->getFirstMediaUrl('gallery_image') }}" alt="{{ $galleryItem->image_alt }}" style="width:180px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                    </div>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label">Image Alt Text</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-align-left icon"></i>
                    <input type="text" name="image_alt" class="field-input" value="{{ old('image_alt', $galleryItem->image_alt ?? '') }}" placeholder="Luxury car gallery">
                </div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
            <div>
                <p class="form-card-title">Publish Settings</p>
                <p class="form-card-subtitle">Visibility and ordering</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Sort Order</label>
                <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $galleryItem->sort_order ?? 0) }}">
            </div>

            <div class="field-group">
                <label class="role-checkbox-item {{ old('status', $galleryItem->status ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $galleryItem->status ?? 1) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active</span>
                </label>
            </div>
        </div>
    </div>
</div>
