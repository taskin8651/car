@extends('frontend.master')

@section('content')

@php
  $specs = $car->specs ?: [
    'Brand' => $car->brand,
    'Model' => $car->model,
    'Category' => $car->category,
    'Color' => $car->color,
    'Seating' => $car->seating,
    'Decoration' => $car->decoration,
    'Driver' => $car->driver,
    'Price' => $car->price_text,
  ];
@endphp

<!-- CAR DETAIL BREADCRUMB HERO START -->
<section class="car-detail-breadcrumb mt-3">
  <div class="container">
    <div class="car-detail-breadcrumb-box text-center">
      <span class="car-detail-breadcrumb-tag">
        <i class="bi bi-car-front-fill"></i>
        Luxury Car Details
      </span>

      <h1>
        {{ $car->name }}
        <span>{{ $car->category ?: 'Premium Wedding Car' }}</span>
      </h1>

      @if($car->summary)
        <p>{{ $car->summary }}</p>
      @endif

      <nav class="car-detail-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <i class="bi bi-chevron-right"></i>
        <a href="{{ route('frontend.cars') }}">Cars</a>
        <i class="bi bi-chevron-right"></i>
        <span>{{ $car->name }}</span>
      </nav>
    </div>
  </div>
</section>
<!-- CAR DETAIL BREADCRUMB HERO END -->

<!-- CAR DETAIL MAIN START -->
<section class="car-detail-section mt-3">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-lg-7">
        <div class="car-detail-gallery">
          <div class="car-detail-main-img">
            <img src="{{ $car->main_image_url }}" alt="{{ $car->image_alt ?? $car->name }}">

            @if($car->category)
              <span class="car-detail-badge">{{ $car->category }}</span>
            @endif
          </div>

          @if(!empty($car->gallery_image_urls))
            <div class="row g-3 mt-1">
              @foreach(array_slice($car->gallery_image_urls, 0, 3) as $galleryImage)
                <div class="col-4">
                  <div class="car-detail-thumb">
                    <img src="{{ $galleryImage }}" alt="{{ $car->image_alt ?? $car->name }}">
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>

      <div class="col-lg-5">
        <div class="car-detail-summary">
          <span class="car-detail-tag">
            @if($car->tag_icon)
              <i class="{{ $car->tag_icon }}"></i>
            @endif
            {{ $car->tag_title ?: 'Wedding Ready Luxury Car' }}
          </span>

          <h2>{{ $car->name }}</h2>

          @if($car->summary)
            <p>{{ $car->summary }}</p>
          @endif

          <div class="car-detail-price">
            <small>Starting From</small>
            <strong>{{ $car->price_text ?: 'On Enquiry' }}</strong>
            @if($car->price_note)
              <span>{{ $car->price_note }}</span>
            @endif
          </div>

          <div class="car-detail-actions">
            <a href="{{ (!$car->enquiry_url || $car->enquiry_url === 'booking-enquiry.html') ? route('frontend.booking-enquiry') : $car->enquiry_url }}" class="btn car-detail-btn-primary">
              Book Now
              <i class="bi bi-arrow-right"></i>
            </a>

            <a href="{{ $car->whatsapp_url ?: 'https://wa.me/919999999999' }}" target="_blank" class="btn car-detail-btn-outline">
              WhatsApp Enquiry
              <i class="bi bi-whatsapp"></i>
            </a>
          </div>

          @if(!empty($car->quick_points))
            <div class="car-detail-quick">
              @foreach($car->quick_points as $point)
                <div>
                  <i class="bi bi-check2-circle"></i>
                  <span>{{ $point }}</span>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CAR DETAIL MAIN END -->

<!-- CAR SPECIFICATIONS START -->
<section class="car-spec-section mt-3">
  <div class="container">
    <div class="car-spec-box">
      <div class="section-heading text-center">
        <span class="car-detail-section-tag">
          <i class="bi bi-list-check"></i>
          Car Specifications
        </span>

        <h2>Car Details & Rental Information</h2>

        <p>Check key details before sending your booking enquiry.</p>
      </div>

      <div class="row g-3">
        @foreach($specs as $label => $value)
          @if($value)
            <div class="col-md-6 col-lg-3">
              <div class="car-spec-card">
                <i class="bi bi-check2-circle"></i>
                <h4>{{ $label }}</h4>
                <span>{{ $value }}</span>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- CAR SPECIFICATIONS END -->

<!-- CAR DESCRIPTION START -->
<section class="car-description-section mt-3">
  <div class="container">
    <div class="row g-4 g-lg-5 align-items-stretch">
      <div class="col-lg-7">
        <div class="car-description-box">
          <span class="car-detail-section-tag">
            <i class="bi bi-info-circle"></i>
            About This Car
          </span>

          <h2>{{ $car->description_title ?: 'Perfect Luxury Car For Wedding & Premium Events' }}</h2>

          @if($car->description_one)
            <p>{{ $car->description_one }}</p>
          @endif

          @if($car->description_two)
            <p>{{ $car->description_two }}</p>
          @endif

          @if(!empty($car->features))
            <div class="car-feature-list">
              @foreach($car->features as $feature)
                <div><i class="bi bi-check2-circle"></i> {{ $feature }}</div>
              @endforeach
            </div>
          @endif
        </div>
      </div>

      <div class="col-lg-5">
        <div class="car-location-box">
          <span class="car-detail-section-tag">
            <i class="bi bi-geo-alt"></i>
            Available Locations
          </span>

          <h3>Service Availability</h3>

          <p>
            Share your event location and route details. Our team will confirm
            availability and pricing.
          </p>

          @if(!empty($car->locations))
            <div class="location-pills">
              @foreach($car->locations as $location)
                <span><i class="bi bi-check2"></i> {{ $location }}</span>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CAR DESCRIPTION END -->

<!-- TERMS START -->
<section class="car-terms-section mt-3">
  <div class="container">
    <div class="car-terms-box">
      <div class="row g-4 align-items-center">
        <div class="col-lg-5">
          <span class="car-detail-section-tag">
            <i class="bi bi-shield-check"></i>
            Terms & Conditions
          </span>

          <h2>Important Booking Notes</h2>

          <p>Please check booking terms before confirming your luxury car rental.</p>
        </div>

        <div class="col-lg-7">
          @if(!empty($car->terms))
            <div class="car-terms-list">
              @foreach($car->terms as $term)
                <div><i class="bi bi-dot"></i> {{ $term }}</div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TERMS END -->

<!-- ENQUIRY FORM START -->
<section class="car-detail-enquiry-section mt-3">
  <div class="container">
    <div class="car-detail-enquiry-box">
      <div class="section-heading text-center">
        <span class="car-detail-section-tag">
          <i class="bi bi-calendar-check"></i>
          Send Car Enquiry
        </span>

        <h2>Check {{ $car->name }} Availability</h2>

        <p>Fill enquiry details and our team will contact you with availability and pricing.</p>
      </div>

      @if(session('car_enquiry_success'))
        <div class="alert alert-success">
          {{ session('car_enquiry_success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          Please check the enquiry form details and try again.
        </div>
      @endif

      <form class="car-detail-enquiry-form" method="POST" action="{{ route('frontend.cars.enquiry', $car) }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label>Your Name <span>*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your name" required>
          </div>

          <div class="col-md-6">
            <label>Mobile Number <span>*</span></label>
            <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="+91 99999 99999" required>
          </div>

          <div class="col-md-6">
            <label>Event Type <span>*</span></label>
            <select name="event_type" class="form-select" required>
              <option disabled value="" {{ old('event_type') ? '' : 'selected' }}>Select Event Type</option>
              @foreach(['Groom Entry', 'Bridal Entry', 'Wedding Car Rental', 'Reception', 'Pre-Wedding Shoot', 'VIP Pickup & Drop'] as $eventType)
                <option value="{{ $eventType }}" {{ old('event_type') === $eventType ? 'selected' : '' }}>{{ $eventType }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label>Event Date <span>*</span></label>
            <input type="date" name="event_date" value="{{ old('event_date') }}" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label>Pickup Location <span>*</span></label>
            <input type="text" name="pickup_location" value="{{ old('pickup_location') }}" class="form-control" placeholder="Enter pickup location" required>
          </div>

          <div class="col-md-6">
            <label>Decoration Required?</label>
            <select name="decoration_required" class="form-select">
              @foreach(['Need Suggestions', 'Yes', 'No'] as $decorationOption)
                <option value="{{ $decorationOption }}" {{ old('decoration_required', 'Need Suggestions') === $decorationOption ? 'selected' : '' }}>{{ $decorationOption }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-12">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="4" placeholder="Tell us about timing, venue, route or special requirement">{{ old('message') }}</textarea>
          </div>

          <div class="col-12">
            <button type="submit" class="btn car-detail-submit-btn">
              Submit Enquiry
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ENQUIRY FORM END -->

@if($relatedCars->count())
  <!-- RELATED CARS START -->
  <section class="related-cars-section mt-3">
    <div class="container">
      <div class="section-heading text-center">
        <span class="car-detail-section-tag">
          <i class="bi bi-car-front"></i>
          Related Cars
        </span>

        <h2>Explore More Premium Cars</h2>

        <p>Choose another luxury car for wedding, reception, photoshoot or VIP event.</p>
      </div>

      <div class="row g-4">
        @foreach($relatedCars as $relatedCar)
          <div class="col-md-6 col-lg-4">
            <div class="related-car-card">
              <img src="{{ $relatedCar->main_image_url }}" alt="{{ $relatedCar->image_alt ?? $relatedCar->name }}">
              <div>
                <span>{{ $relatedCar->category }}</span>
                <h3>{{ $relatedCar->name }}</h3>
                <a href="{{ route('frontend.cars.show', $relatedCar->slug) }}">View Details <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- RELATED CARS END -->
@endif

@endsection
