<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-images"></i></div>
            <div>
                <p class="form-card-title">Slide Content</p>
                <p class="form-card-subtitle">Headline, tag and description</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Tag Icon</label>
                <input type="text" name="tag_icon" class="field-input" value="{{ old('tag_icon', $homeHeroSlide->tag_icon ?? 'bi bi-stars') }}" placeholder="bi bi-stars">
            </div>

            <div class="field-group">
                <label class="field-label">Tag Title <span class="req">*</span></label>
                <input type="text" name="tag_title" class="field-input {{ $errors->has('tag_title') ? 'error' : '' }}" value="{{ old('tag_title', $homeHeroSlide->tag_title ?? '') }}" required>
            </div>

            <div class="field-group">
                <label class="field-label">Title <span class="req">*</span></label>
                <input type="text" name="title" class="field-input {{ $errors->has('title') ? 'error' : '' }}" value="{{ old('title', $homeHeroSlide->title ?? '') }}" required>
            </div>

            <div class="field-group">
                <label class="field-label">Highlighted Title</label>
                <input type="text" name="title_highlight" class="field-input" value="{{ old('title_highlight', $homeHeroSlide->title_highlight ?? '') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Description <span class="req">*</span></label>
                <textarea name="description" rows="4" class="field-input {{ $errors->has('description') ? 'error' : '' }}" required>{{ old('description', $homeHeroSlide->description ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-image"></i></div>
            <div>
                <p class="form-card-title">Images</p>
                <p class="form-card-subtitle">Background and right-side car image</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Background Image URL</label>
                <textarea name="background_image_url" rows="3" class="field-input">{{ old('background_image_url', $homeHeroSlide->background_image_url ?? '') }}</textarea>
            </div>

            <div class="field-group">
                <label class="field-label">Upload Background Image</label>
                <input type="file" name="background_image" class="field-input" accept="image/*">
            </div>

            <div class="field-group">
                <label class="field-label">Showcase Image URL</label>
                <textarea name="showcase_image_url" rows="3" class="field-input">{{ old('showcase_image_url', $homeHeroSlide->showcase_image_url ?? '') }}</textarea>
            </div>

            <div class="field-group">
                <label class="field-label">Upload Showcase Image</label>
                <input type="file" name="showcase_image" class="field-input" accept="image/*">
            </div>

            <div class="field-group">
                <label class="field-label">Image Alt</label>
                <input type="text" name="image_alt" class="field-input" value="{{ old('image_alt', $homeHeroSlide->image_alt ?? '') }}">
            </div>

            @if(isset($homeHeroSlide) && $homeHeroSlide->exists)
                <div style="display:flex;gap:14px;flex-wrap:wrap;">
                    <img src="{{ $homeHeroSlide->background_image_src }}" alt="" style="width:160px;height:90px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;">
                    <img src="{{ $homeHeroSlide->showcase_image_src }}" alt="" style="width:160px;height:90px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;">
                </div>
            @endif
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-mouse-pointer"></i></div>
            <div>
                <p class="form-card-title">Buttons & Badge</p>
                <p class="form-card-subtitle">CTA links and showcase badge</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Badge Icon</label>
                <input type="text" name="badge_icon" class="field-input" value="{{ old('badge_icon', $homeHeroSlide->badge_icon ?? 'bi bi-gem') }}" placeholder="bi bi-gem">
            </div>

            <div class="field-group">
                <label class="field-label">Badge Title</label>
                <input type="text" name="badge_title" class="field-input" value="{{ old('badge_title', $homeHeroSlide->badge_title ?? '') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Primary Button</label>
                <input type="text" name="primary_button_text" class="field-input" value="{{ old('primary_button_text', $homeHeroSlide->primary_button_text ?? '') }}" placeholder="Book Luxury Car">
                <input type="text" name="primary_button_url" class="field-input mt-2" value="{{ old('primary_button_url', $homeHeroSlide->primary_button_url ?? '') }}" placeholder="/booking-enquiry">
                <input type="text" name="primary_button_icon" class="field-input mt-2" value="{{ old('primary_button_icon', $homeHeroSlide->primary_button_icon ?? 'bi bi-arrow-right') }}" placeholder="bi bi-arrow-right">
            </div>

            <div class="field-group">
                <label class="field-label">Secondary Button</label>
                <input type="text" name="secondary_button_text" class="field-input" value="{{ old('secondary_button_text', $homeHeroSlide->secondary_button_text ?? '') }}" placeholder="View Cars">
                <input type="text" name="secondary_button_url" class="field-input mt-2" value="{{ old('secondary_button_url', $homeHeroSlide->secondary_button_url ?? '') }}" placeholder="/cars">
                <input type="text" name="secondary_button_icon" class="field-input mt-2" value="{{ old('secondary_button_icon', $homeHeroSlide->secondary_button_icon ?? 'bi bi-car-front') }}" placeholder="bi bi-car-front">
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-chart-bar"></i></div>
            <div>
                <p class="form-card-title">Trust Cards</p>
                <p class="form-card-subtitle">Three small cards shown below CTA</p>
            </div>
        </div>

        <div class="form-card-body">
            @php
                $trustItems = old('trust_numbers')
                    ? collect(old('trust_numbers'))->map(fn($number, $index) => ['number' => $number, 'label' => old('trust_labels')[$index] ?? ''])->toArray()
                    : ($homeHeroSlide->trust_items ?? []);
            @endphp

            @for($i = 0; $i < 3; $i++)
                <div class="field-group">
                    <label class="field-label">Trust Card {{ $i + 1 }}</label>
                    <input type="text" name="trust_numbers[]" class="field-input" value="{{ $trustItems[$i]['number'] ?? '' }}" placeholder="50+">
                    <input type="text" name="trust_labels[]" class="field-input mt-2" value="{{ $trustItems[$i]['label'] ?? '' }}" placeholder="Premium Cars">
                </div>
            @endfor
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
                <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $homeHeroSlide->sort_order ?? 0) }}">
            </div>

            <div class="field-group">
                <label class="role-checkbox-item {{ old('status', $homeHeroSlide->status ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $homeHeroSlide->status ?? 1) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active</span>
                </label>
            </div>
        </div>
    </div>
</div>
