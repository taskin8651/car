@php
    $quickPoints = old('quick_points', $car->quick_points ?? ['4+1 Seating', 'Decoration Available', 'Driver Included', 'Local Booking']);
    $features = old('features', $car->features ?? ['Groom entry ready', 'Bridal arrival suitable', 'Premium event travel', 'Photoshoot friendly look']);
    $locations = old('locations', $car->locations ?? ['Wedding Venues', 'Banquet Halls', 'Hotels & Resorts', 'Local Pickup', 'VIP Drop']);
    $terms = old('terms', $car->terms ?? [
        'Booking depends on car availability for selected date.',
        'Final price may vary by location, route and duration.',
        'Decoration charges may be extra as per requirement.',
        'Customer must share correct event timing and pickup location.',
    ]);
    $galleryUrls = old('gallery_urls', $car->gallery_urls ?? []);
@endphp

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-car-side"></i></div>
            <div>
                <p class="form-card-title">Car Information</p>
                <p class="form-card-subtitle">Name, category, brand and model</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Car Name <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>
                    <input type="text" name="name" class="field-input {{ $errors->has('name') ? 'error' : '' }}" value="{{ old('name', $car->name ?? '') }}" required placeholder="BMW 5 Series">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Slug</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-link icon"></i>
                    <input type="text" name="slug" class="field-input {{ $errors->has('slug') ? 'error' : '' }}" value="{{ old('slug', $car->slug ?? '') }}" placeholder="bmw-5-series">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Brand</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-building icon"></i>
                    <input type="text" name="brand" class="field-input" value="{{ old('brand', $car->brand ?? '') }}" placeholder="BMW">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Model</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-car icon"></i>
                    <input type="text" name="model" class="field-input" value="{{ old('model', $car->model ?? '') }}" placeholder="5 Series">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Category</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tags icon"></i>
                    <input type="text" name="category" class="field-input" value="{{ old('category', $car->category ?? '') }}" placeholder="Luxury Sedan">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Short Summary</label>
                <textarea name="summary" rows="4" class="field-input">{{ old('summary', $car->summary ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-list-check"></i></div>
            <div>
                <p class="form-card-title">Specs & Pricing</p>
                <p class="form-card-subtitle">Main car specifications</p>
            </div>
        </div>

        <div class="form-card-body">
            @foreach(['color' => 'White / Black', 'seating' => '4+1 Seats', 'decoration' => 'Available', 'driver' => 'Included', 'price_text' => '₹9,999+'] as $field => $placeholder)
                <div class="field-group">
                    <label class="field-label">{{ \Illuminate\Support\Str::headline($field) }}</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>
                        <input type="text" name="{{ $field }}" class="field-input" value="{{ old($field, $car->{$field} ?? '') }}" placeholder="{{ $placeholder }}">
                    </div>
                </div>
            @endforeach

            <div class="field-group">
                <label class="field-label">Price Note</label>
                <textarea name="price_note" rows="3" class="field-input">{{ old('price_note', $car->price_note ?? 'Final price depends on location, date, duration and decoration.') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-image"></i></div>
            <div>
                <p class="form-card-title">Images</p>
                <p class="form-card-subtitle">Image URL fallback and MediaLibrary upload</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Main Image URL</label>
                <textarea name="image_url" rows="3" class="field-input">{{ old('image_url', $car->image_url ?? '') }}</textarea>
            </div>

            <div class="field-group">
                <label class="field-label">Main Image Upload</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-image icon"></i>
                    <input type="file" name="main_image" class="field-input" accept="image/*">
                </div>
                @if(isset($car) && $car->getFirstMediaUrl('car_main_image'))
                    <div style="margin-top:14px;">
                        <img src="{{ $car->getFirstMediaUrl('car_main_image') }}" alt="{{ $car->image_alt }}" style="width:180px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                    </div>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label">Image Alt Text</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-align-left icon"></i>
                    <input type="text" name="image_alt" class="field-input" value="{{ old('image_alt', $car->image_alt ?? '') }}" placeholder="BMW 5 Series luxury wedding car">
                </div>
            </div>

            @for($i = 0; $i < 3; $i++)
                <div class="field-group">
                    <label class="field-label">Gallery URL {{ $i + 1 }}</label>
                    <textarea name="gallery_urls[]" rows="2" class="field-input">{{ $galleryUrls[$i] ?? '' }}</textarea>
                </div>
            @endfor

            <div class="field-group">
                <label class="field-label">Gallery Uploads</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-images icon"></i>
                    <input type="file" name="gallery_images[]" class="field-input" accept="image/*" multiple>
                </div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-pen"></i></div>
            <div>
                <p class="form-card-title">Detail Content</p>
                <p class="form-card-subtitle">Detail page text sections</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Tag Title</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-gem icon"></i>
                    <input type="text" name="tag_title" class="field-input" value="{{ old('tag_title', $car->tag_title ?? 'Wedding Ready Luxury Car') }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Tag Icon</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>
                    <input type="text" name="tag_icon" class="field-input" value="{{ old('tag_icon', $car->tag_icon ?? 'bi bi-gem') }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Description Title</label>
                <input type="text" name="description_title" class="field-input" value="{{ old('description_title', $car->description_title ?? '') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Description One</label>
                <textarea name="description_one" rows="5" class="field-input">{{ old('description_one', $car->description_one ?? '') }}</textarea>
            </div>

            <div class="field-group">
                <label class="field-label">Description Two</label>
                <textarea name="description_two" rows="5" class="field-input">{{ old('description_two', $car->description_two ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-check-double"></i></div>
            <div>
                <p class="form-card-title">Lists</p>
                <p class="form-card-subtitle">Quick points, features, locations and terms</p>
            </div>
        </div>

        <div class="form-card-body">
            @foreach(['quick_points' => $quickPoints, 'features' => $features, 'locations' => $locations, 'terms' => $terms] as $field => $items)
                @for($i = 0; $i < 4; $i++)
                    <div class="field-group">
                        <label class="field-label">{{ \Illuminate\Support\Str::headline($field) }} {{ $i + 1 }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-check icon"></i>
                            <input type="text" name="{{ $field }}[]" class="field-input" value="{{ $items[$i] ?? '' }}">
                        </div>
                    </div>
                @endfor
            @endforeach
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
            <div>
                <p class="form-card-title">Publish Settings</p>
                <p class="form-card-subtitle">Status, CTA and ordering</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label">Status Label</label>
                <input type="text" name="status_label" class="field-input" value="{{ old('status_label', $car->status_label ?? 'Available') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Status CSS Class</label>
                <input type="text" name="status_class" class="field-input" value="{{ old('status_class', $car->status_class ?? 'available') }}" placeholder="available or enquiry">
            </div>

            <div class="field-group">
                <label class="field-label">Enquiry URL</label>
                <input type="text" name="enquiry_url" class="field-input" value="{{ old('enquiry_url', $car->enquiry_url ?? 'booking-enquiry.html') }}">
            </div>

            <div class="field-group">
                <label class="field-label">WhatsApp URL</label>
                <input type="text" name="whatsapp_url" class="field-input" value="{{ old('whatsapp_url', $car->whatsapp_url ?? 'https://wa.me/919999999999') }}">
            </div>

            <div class="field-group">
                <label class="field-label">Sort Order</label>
                <input type="number" name="sort_order" class="field-input" value="{{ old('sort_order', $car->sort_order ?? 0) }}">
            </div>

            <div class="field-group">
                <label class="role-checkbox-item {{ old('is_active', $car->is_active ?? 1) ? 'checked' : '' }}">
                    <input type="checkbox" name="is_active" value="1" class="role-checkbox" {{ old('is_active', $car->is_active ?? 1) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Active</span>
                </label>
            </div>
        </div>
    </div>
</div>
