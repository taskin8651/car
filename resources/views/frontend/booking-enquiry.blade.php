

@extends('frontend.master')

@section('content')

  <!-- BOOKING BREADCRUMB HERO START -->
  <section class="booking-dark-breadcrumb">
    <div class="container">

      <div class="booking-breadcrumb-box text-center">

        <span class="booking-breadcrumb-tag">
          <i class="bi bi-calendar-check"></i>
          Booking Enquiry
        </span>

        <h1>
          Book Your Luxury Car For
          <span>Wedding & Premium Events</span>
        </h1>

        <p>
          Share your event details and our team will confirm car availability,
          pricing, decoration options and booking support.
        </p>

        <nav class="booking-breadcrumb-nav" aria-label="breadcrumb">
          <a href="{{ url('/') }}">Home</a>
          <i class="bi bi-chevron-right"></i>
          <span>Booking Enquiry</span>
        </nav>

      </div>

    </div>
  </section>
  <!-- BOOKING BREADCRUMB HERO END -->


  <!-- BOOKING FORM START -->
  <section class="booking-form-section">
    <div class="container">

      <div class="booking-form-box">
        <div class="row align-items-stretch g-4 g-lg-5">

          <!-- LEFT CONTENT -->
          <div class="col-lg-5">
            <div class="booking-info-panel">

              <span class="booking-section-tag">
                <i class="bi bi-car-front-fill"></i>
                Send Your Requirement
              </span>

              <h2>Tell Us About Your Wedding Or Event</h2>

              <p>
                Fill this enquiry form with your date, location and preferred car.
                Our team will contact you with availability and pricing.
              </p>

              <div class="booking-info-list">
                <div>
                  <i class="bi bi-check2-circle"></i>
                  <span>Car availability confirmation</span>
                </div>

                <div>
                  <i class="bi bi-check2-circle"></i>
                  <span>Decoration option support</span>
                </div>

                <div>
                  <i class="bi bi-check2-circle"></i>
                  <span>Driver included guidance</span>
                </div>

                <div>
                  <i class="bi bi-check2-circle"></i>
                  <span>Quick call & WhatsApp response</span>
                </div>
              </div>

              <div class="booking-support-card">
                <i class="bi bi-whatsapp"></i>
                <div>
                  <h5>Need Fast Help?</h5>
                  <p>Send your enquiry on WhatsApp for quick availability confirmation.</p>
                  <a href="https://wa.me/919999999999" target="_blank">
                    WhatsApp Now
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>

          <!-- RIGHT FORM -->
          <div class="col-lg-7">
            @if(session('booking_enquiry_success'))
              <div class="alert alert-success">
                {{ session('booking_enquiry_success') }}
              </div>
            @endif

            @if($errors->any())
              <div class="alert alert-danger">
                Please check the form details and try again.
              </div>
            @endif

            <form class="booking-enquiry-form" method="POST" action="{{ route('frontend.booking-enquiry.store') }}">
              @csrf

              <div class="row g-3">

                <div class="col-md-6">
                  <label>Customer Name <span>*</span></label>
                  <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" placeholder="Enter your full name"
                    required>
                </div>

                <div class="col-md-6">
                  <label>Mobile Number <span>*</span></label>
                  <input type="tel" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="+91 99999 99999" required>
                </div>

                <div class="col-md-6">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                </div>

                <div class="col-md-6">
                  <label>Event Type <span>*</span></label>
                  <select class="form-select" name="event_type" required>
                    <option disabled value="" {{ old('event_type') ? '' : 'selected' }}>Select Event Type</option>
                    @foreach(['Groom Entry', 'Bridal Entry', 'Wedding Car Rental', 'Reception', 'Engagement', 'Pre-Wedding Shoot', 'VIP Guest Pickup & Drop', 'Corporate / Premium Event'] as $eventType)
                      <option value="{{ $eventType }}" {{ old('event_type') === $eventType ? 'selected' : '' }}>{{ $eventType }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label>Event Date <span>*</span></label>
                  <input type="date" class="form-control" name="event_date" value="{{ old('event_date') }}" required>
                </div>

                <div class="col-md-6">
                  <label>Event Time <span>*</span></label>
                  <input type="time" class="form-control" name="event_time" value="{{ old('event_time') }}" required>
                </div>

                <div class="col-md-6">
                  <label>Pickup Location <span>*</span></label>
                  <input type="text" class="form-control" name="pickup_location" value="{{ old('pickup_location') }}" placeholder="Enter pickup location"
                    required>
                </div>

                <div class="col-md-6">
                  <label>Drop Location</label>
                  <input type="text" class="form-control" name="drop_location" value="{{ old('drop_location') }}" placeholder="Enter drop location">
                </div>

                <div class="col-md-6">
                  <label>Preferred Car <span>*</span></label>
                  <select class="form-select" name="preferred_car" required>
                    <option disabled value="" {{ old('preferred_car') ? '' : 'selected' }}>Select Preferred Car</option>
                    @foreach($cars as $car)
                      <option value="{{ $car->name }}" {{ old('preferred_car') === $car->name ? 'selected' : '' }}>{{ $car->name }}</option>
                    @endforeach
                    <option value="Need Suggestions" {{ old('preferred_car') === 'Need Suggestions' ? 'selected' : '' }}>Need Suggestions</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label>Decoration Required? <span>*</span></label>
                  <select class="form-select" name="decoration_required" required>
                    <option disabled value="" {{ old('decoration_required') ? '' : 'selected' }}>Select Option</option>
                    @foreach(['Yes', 'No', 'Need Suggestions'] as $decorationOption)
                      <option value="{{ $decorationOption }}" {{ old('decoration_required') === $decorationOption ? 'selected' : '' }}>{{ $decorationOption }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label>Message / Special Requirement</label>
                  <textarea class="form-control" name="message" rows="5"
                    placeholder="Tell us about venue, route, timing, decoration style or any special requirement">{{ old('message') }}</textarea>
                </div>

                <div class="col-12">
                  <div class="booking-form-note">
                    <i class="bi bi-info-circle"></i>
                    <span>
                      After enquiry submission, our team will contact you for availability,
                      pricing and booking confirmation.
                    </span>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn booking-submit-btn">
                    Submit Booking Enquiry
                    <i class="bi bi-arrow-right"></i>
                  </button>
                </div>

              </div>

            </form>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- BOOKING FORM END -->


  <!-- BOOKING PROCESS START -->
  <section class="booking-process-section">
    <div class="container">

      <div class="section-heading text-center">
        <span class="booking-section-tag">
          <i class="bi bi-list-check"></i>
          Booking Flow
        </span>

        <h2>How Your Booking Enquiry Works</h2>

        <p>
          Simple manual confirmation process for luxury wedding car bookings.
        </p>
      </div>

      <div class="row g-4">

        <div class="col-md-6 col-lg-3">
          <div class="booking-process-card">
            <span>01</span>
            <i class="bi bi-pencil-square"></i>
            <h4>Fill Enquiry</h4>
            <p>Share event date, time, location and preferred car details.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="booking-process-card">
            <span>02</span>
            <i class="bi bi-car-front"></i>
            <h4>Check Availability</h4>
            <p>Our team checks selected car availability for your event.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="booking-process-card">
            <span>03</span>
            <i class="bi bi-whatsapp"></i>
            <h4>Get Confirmation</h4>
            <p>We contact you with price, decoration and booking details.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="booking-process-card">
            <span>04</span>
            <i class="bi bi-stars"></i>
            <h4>Enjoy Premium Ride</h4>
            <p>Your luxury car arrives on time for your special event.</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- BOOKING PROCESS END -->


  <!-- BOOKING CTA START -->
  <section class="booking-cta-section">
    <div class="container">

      <div class="booking-cta-box">
        <div>
          <span class="booking-section-tag">
            <i class="bi bi-headset"></i>
            Direct Support
          </span>

          <h2>Want To Confirm Availability Faster?</h2>

          <p>
            Call or WhatsApp us with your event date, pickup location and preferred car.
          </p>
        </div>

        <div class="booking-cta-actions">
          <a href="tel:+919999999999" class="btn booking-btn-primary">
            Call Now
            <i class="bi bi-telephone"></i>
          </a>

          <a href="https://wa.me/919999999999" target="_blank" class="btn booking-btn-outline">
            WhatsApp Now
            <i class="bi bi-whatsapp"></i>
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- BOOKING CTA END -->

@endsection
