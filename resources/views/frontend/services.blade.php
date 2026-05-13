@extends('frontend.master')

@section('content')



<!-- SERVICES BREADCRUMB HERO START -->
<section class="services-dark-breadcrumb">
  <div class="container">

    <div class="services-breadcrumb-box text-center">

      <span class="services-breadcrumb-tag">
        <i class="bi bi-gem"></i>
        Luxury Car Rental Services
      </span>

      <h1>
        Premium Cars For Weddings & Special Events
      </h1>

      <p>
        Luxury car rental services for groom entry, bridal entry, receptions,
        engagements, pre-wedding shoots, VIP guests and premium event travel.
      </p>

      <nav class="services-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Services</span>
      </nav>

    </div>

  </div>
</section>
<!-- SERVICES BREADCRUMB HERO END -->




@if($serviceIntro)
  <!-- SERVICES INTRO START -->
  <section class="services-intro-section">
    <div class="container">
      <div class="services-intro-box">
        <div class="row align-items-center g-4">

          <div class="col-lg-5">
            <span class="services-section-tag">
              @if($serviceIntro->tag_icon)
                <i class="{{ $serviceIntro->tag_icon }}"></i>
              @endif
              {{ $serviceIntro->tag_title }}
            </span>

            <h2>{{ $serviceIntro->title }}</h2>
          </div>

          <div class="col-lg-7">
            @if($serviceIntro->description)
              <p>{{ $serviceIntro->description }}</p>
            @endif

            @if(!empty($serviceIntro->pills))
              <div class="services-intro-pills">
                @foreach($serviceIntro->pills as $pill)
                  <span><i class="bi bi-check2"></i> {{ $pill }}</span>
                @endforeach
              </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- SERVICES INTRO END -->
@endif


@if($serviceCards->count())
  <!-- SERVICES GRID START -->
  <section class="services-list-section">
    <div class="container">

      <div class="section-heading text-center">
        <span class="services-section-tag">
          <i class="bi bi-grid"></i>
          Our Premium Services
        </span>

        <h2>Wedding & Event Car Rental Services</h2>

        <p>
          Select from our premium services created for weddings, celebrations,
          photoshoots, VIP movement and corporate occasions.
        </p>
      </div>

      <div class="row g-4 services-list-row">

        @foreach($serviceCards as $serviceCard)
          <div class="col-md-6 col-lg-3">
            <div class="service-page-card">
              @if($serviceCard->icon)
                <div class="service-icon">
                  <i class="{{ $serviceCard->icon }}"></i>
                </div>
              @endif

              <h3>{{ $serviceCard->title }}</h3>

              @if($serviceCard->description)
                <p>{{ $serviceCard->description }}</p>
              @endif

              <a href="{{ $serviceCard->button_url ?: 'booking-enquiry.html' }}">
                {{ $serviceCard->button_text ?: 'Enquire Now' }}
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        @endforeach

      </div>

    </div>
  </section>
  <!-- SERVICES GRID END -->
@endif


@if($serviceHighlight)
  <!-- SERVICE HIGHLIGHT START -->
  <section class="service-highlight-section">
    <div class="container">
      <div class="service-highlight-box">
        <div class="row align-items-center g-4 g-lg-5">

          <div class="col-lg-6">
            <div class="service-highlight-image">
              <img src="{{ $serviceHighlight->image_url }}"
                alt="{{ $serviceHighlight->image_alt ?? $serviceHighlight->title }}">

              @if($serviceHighlight->badge_title)
                <span>
                  @if($serviceHighlight->badge_icon)
                    <i class="{{ $serviceHighlight->badge_icon }}"></i>
                  @endif
                  {{ $serviceHighlight->badge_title }}
                </span>
              @endif
            </div>
          </div>

          <div class="col-lg-6">
            <span class="services-section-tag">
              @if($serviceHighlight->tag_icon)
                <i class="{{ $serviceHighlight->tag_icon }}"></i>
              @endif
              {{ $serviceHighlight->tag_title }}
            </span>

            <h2>{{ $serviceHighlight->title }}</h2>

            @if($serviceHighlight->description)
              <p>{{ $serviceHighlight->description }}</p>
            @endif

            @if(!empty($serviceHighlight->features))
              <div class="service-highlight-list">
                @foreach($serviceHighlight->features as $feature)
                  <div><i class="bi bi-check2-circle"></i> {{ $feature }}</div>
                @endforeach
              </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- SERVICE HIGHLIGHT END -->
@endif


  <!-- BOOKING PROCESS START -->
  <section class="service-process-section">
    <div class="container">

      <div class="section-heading text-center">
        <span class="services-section-tag">
          <i class="bi bi-list-check"></i>
          Simple Booking Process
        </span>

        <h2>Book Your Luxury Car In Simple Steps</h2>

        <p>
          Share your event details and our team will confirm car availability,
          pricing and decoration options.
        </p>
      </div>

      <div class="row g-4">

        <div class="col-md-6 col-lg-3">
          <div class="process-card">
            <span>01</span>
            <i class="bi bi-car-front"></i>
            <h4>Select Service</h4>
            <p>Choose wedding, reception, photoshoot, VIP pickup or event service.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="process-card">
            <span>02</span>
            <i class="bi bi-calendar-event"></i>
            <h4>Share Event Details</h4>
            <p>Send event date, time, pickup location and preferred car details.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="process-card">
            <span>03</span>
            <i class="bi bi-whatsapp"></i>
            <h4>Get Confirmation</h4>
            <p>Our team confirms availability, pricing and decoration options.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="process-card">
            <span>04</span>
            <i class="bi bi-stars"></i>
            <h4>Enjoy Premium Ride</h4>
            <p>Your luxury car arrives on time for a smooth event experience.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- BOOKING PROCESS END -->


  <!-- SERVICES CTA START -->
  <section class="services-cta-section">
    <div class="container">

      <div class="services-cta-box">
        <div>
          <span class="services-page-tag">
            <i class="bi bi-calendar-check"></i>
            Ready To Book?
          </span>

          <h2>Need A Luxury Car For Your Wedding Or Event?</h2>

          <p>
            Share your requirement and our team will help you choose the best luxury
            car service with availability and pricing.
          </p>
        </div>

        <div class="services-cta-actions">
          <a href="booking-enquiry.html" class="btn services-btn-primary">
            Send Enquiry
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="https://wa.me/919999999999" target="_blank" class="btn services-btn-outline">
            WhatsApp Now
            <i class="bi bi-whatsapp"></i>
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- SERVICES CTA END -->


@endsection
