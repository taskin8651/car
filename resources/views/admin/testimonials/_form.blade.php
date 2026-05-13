<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-comment-dots"></i></div>
            <div>
                <p class="form-card-title">Testimonial Content</p>
                <p class="form-card-subtitle">Customer name, event and review</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Client Name <span class="req">*</span></label>
                <input type="text" name="client_name" class="field-input {{ $errors->has('client_name') ? 'error' : '' }}" value="{{ old('client_name', $testimonial->client_name ?? '') }}" required>
            </div>

            <div class="field-group">
                <label class="field-label">Event Type <span class="req">*</span></label>
                <input type="text" name="event_type" class="field-input {{ $errors->has('event_type') ? 'error' : '' }}" value="{{ old('event_type', $testimonial->event_type ?? '') }}" required placeholder="Wedding Event">
            </div>

            <div class="field-group">
                <label class="field-label">Message <span class="req">*</span></label>
                <textarea name="message" rows="5" class="field-input {{ $errors->has('message') ? 'error' : '' }}" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-star"></i></div>
            <div>
                <p class="form-card-title">Display Settings</p>
                <p class="form-card-subtitle">Rating, avatar and order</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Rating</label>
                <input type="number" min="1" max="5" name="rating" class="field-input" value="{{ old('rating', $testimonial->rating ?? 5) }}">
            </div>

            <div class="field-group">
                <label class="field-label">Avatar Text</label>
                <input type="text" name="avatar_text" maxlength="5" class="field-input" value="{{ old('avatar_text', $testimonial->avatar_text ?? '') }}" placeholder="R">
            </div>

            <div class="field-group">
                <label class="field-label">Sort Order</label>
                <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
            </div>

            <div class="field-group">
                <label class="role-checkbox-item {{ old('status', $testimonial->status ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $testimonial->status ?? 1) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active</span>
                </label>
            </div>
        </div>
    </div>
</div>
