@extends('frontend.master')

@section('content')

<!-- CARS BREADCRUMB HERO START -->
<section class="cars-premium-breadcrumb">
  <div class="container">
    <div class="cars-premium-breadcrumb-box">
      <span class="cars-premium-tag">
        <i class="bi bi-car-front-fill"></i>
        Premium Wedding Car Collection
      </span>

      <h1>Choose Your Dream Wedding Car</h1>

      <p>
        Explore luxury sedans, premium SUVs, vintage cars, sports cars and premium wedding entry cars.
      </p>

      <nav class="cars-premium-crumb" aria-label="breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Cars</span>
      </nav>
    </div>
  </div>
</section>
<!-- CARS BREADCRUMB HERO END -->

<!-- FILTER SECTION START -->
<section class="cars-filter-section">
  <div class="container">
    <div class="cars-filter-box">
      <div class="filter-heading">
        <span>
          <i class="bi bi-funnel"></i>
          Find Your Perfect Car
        </span>

        <p>Filter cars by brand, type, budget, occasion and availability.</p>
      </div>

      <form class="row g-3">
        <div class="col-md-6 col-lg-3">
          <label>Car Brand</label>
          <select class="form-select">
            <option selected>All Brands</option>
            @foreach($cars->pluck('brand')->filter()->unique() as $brand)
              <option>{{ $brand }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 col-lg-3">
          <label>Car Type</label>
          <select class="form-select">
            <option selected>All Types</option>
            @foreach($cars->pluck('category')->filter()->unique() as $category)
              <option>{{ $category }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 col-lg-3">
          <label>Occasion</label>
          <select class="form-select">
            <option selected>Any Occasion</option>
            <option>Groom Entry</option>
            <option>Bridal Entry</option>
            <option>Reception</option>
            <option>Pre-Wedding Shoot</option>
            <option>VIP Pickup</option>
          </select>
        </div>

        <div class="col-md-6 col-lg-3">
          <label>Price Range</label>
          <select class="form-select">
            <option selected>Any Budget</option>
            <option>Below Rs. 10,000</option>
            <option>Rs. 10,000 - Rs. 20,000</option>
            <option>Rs. 20,000 - Rs. 40,000</option>
            <option>On Enquiry</option>
          </select>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- FILTER SECTION END -->

<!-- CARS LISTING START -->
<section class="cars-listing-section">
  <div class="container">
    <div class="section-heading text-center">
      <span class="cars-section-tag">
        <i class="bi bi-stars"></i>
        Available Luxury Cars
      </span>

      <h2>Premium Cars For Wedding & Events</h2>

      <p>
        Choose from our curated collection of luxury cars designed for royal entries,
        stylish arrivals and memorable celebrations.
      </p>
    </div>

    <div class="row g-4 cars-list-row">
      @foreach($cars as $car)
        <div class="col-md-6 col-lg-4">
          <div class="premium-car-card">
            <div class="premium-car-img">
              <img src="{{ $car->main_image_url }}" alt="{{ $car->image_alt ?? $car->name }}">

              @if($car->category)
                <span class="car-category">{{ $car->category }}</span>
              @endif

              <span class="car-status {{ $car->status_class ?: 'available' }}">
                {{ $car->status_label ?: 'Available' }}
              </span>
            </div>

            <div class="premium-car-content">
              <div class="car-title-row">
                <h3>{{ $car->name }}</h3>
                <span>{{ $car->price_text ?: 'On Enquiry' }}</span>
              </div>

              @if($car->summary)
                <p>{{ $car->summary }}</p>
              @endif

              @if(!empty($car->quick_points))
                <ul class="car-specs">
                  @foreach($car->quick_points as $point)
                    <li><i class="bi bi-check2-circle"></i> {{ $point }}</li>
                  @endforeach
                </ul>
              @endif

              <div class="car-actions">
                <a href="{{ route('frontend.cars.show', $car->slug) }}" class="btn car-view-btn">
                  View Details
                </a>

                <a href="{{ (!$car->enquiry_url || $car->enquiry_url === 'booking-enquiry.html') ? route('frontend.booking-enquiry') : $car->enquiry_url }}" class="btn car-enquiry-btn">
                  Enquire Now
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- CARS LISTING END -->

<!-- CAR CATEGORIES START -->
<section class="car-categories-section">
  <div class="container">
    <div class="category-premium-box">
      <div class="row align-items-center g-4">
        <div class="col-lg-5">
          <span class="cars-section-tag">
            <i class="bi bi-grid"></i>
            Car Categories
          </span>

          <h2>Find Cars By Event Style</h2>

          <p>
            Select your car based on wedding theme, entry style, comfort level
            and occasion requirement.
          </p>
        </div>

        <div class="col-lg-7">
          <div class="category-grid">
            @foreach($cars->pluck('category')->filter()->unique()->take(6) as $category)
              <div><i class="bi bi-car-front"></i> {{ $category }}</div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CAR CATEGORIES END -->

<!-- CARS CTA START -->
<section class="cars-cta-section">
  <div class="container">
    <div class="cars-cta-box">
      <div>
        <span class="cars-page-tag">
          <i class="bi bi-calendar-check"></i>
          Need Help Choosing?
        </span>

        <h2>Not Sure Which Car Is Best For Your Event?</h2>

        <p>
          Share your event date, venue and preferred style. Our team will suggest
          suitable cars with availability and pricing.
        </p>
      </div>

      <div class="cars-cta-actions">
        <a href="{{ route('frontend.booking-enquiry') }}" class="btn cars-btn-primary">
          Send Enquiry
          <i class="bi bi-arrow-right"></i>
        </a>

        <a href="https://wa.me/919999999999" target="_blank" class="btn cars-btn-outline">
          WhatsApp Now
          <i class="bi bi-whatsapp"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- CARS CTA END -->

@endsection
