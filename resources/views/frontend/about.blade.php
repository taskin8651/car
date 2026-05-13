@extends('frontend.master')

@section('content')

<!-- ABOUT BREADCRUMB HERO START -->
<section class="about-light-breadcrumb">
    <div class="container">

        <div class="about-light-content text-center">

            <span class="about-light-tag">
                <i class="bi bi-gem"></i>
                About CarBookKro
            </span>

            <h1>
                Luxury Wedding Car Rental Service
            </h1>

            <p>
                Premium cars for weddings, groom entry, bridal entry, receptions,
                engagements and special event moments.
            </p>

            <nav class="about-light-crumb" aria-label="breadcrumb">
                <a href="{{ url('/') }}">
                    Home
                </a>
                <i class="bi bi-chevron-right"></i>
                <span>About Us</span>
            </nav>

        </div>

    </div>
</section>
<!-- ABOUT BREADCRUMB HERO END -->


@if($aboutCompany)
    <!-- COMPANY INTRO START -->
    <section class="about-company-section">
        <div class="container">
            <div class="about-premium-box">
                <div class="row align-items-center g-4 g-lg-5">

                    <div class="col-lg-6">
                        <div class="about-image-card">
                            <img src="{{ $aboutCompany->image_url }}"
                                 alt="{{ $aboutCompany->image_alt ?? $aboutCompany->title }}">

                            @if($aboutCompany->badge_title)
                                <span class="image-badge">
                                    @if($aboutCompany->badge_icon)
                                        <i class="{{ $aboutCompany->badge_icon }}"></i>
                                    @endif

                                    {{ $aboutCompany->badge_title }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-content">

                            @if($aboutCompany->tag_title)
                                <span class="about-section-tag dark">
                                    @if($aboutCompany->tag_icon)
                                        <i class="{{ $aboutCompany->tag_icon }}"></i>
                                    @endif

                                    {{ $aboutCompany->tag_title }}
                                </span>
                            @endif

                            <h2>{{ $aboutCompany->title }}</h2>

                            @if($aboutCompany->description_one)
                                <p>{{ $aboutCompany->description_one }}</p>
                            @endif

                            @if($aboutCompany->description_two)
                                <p>{{ $aboutCompany->description_two }}</p>
                            @endif

                            @if(!empty($aboutCompany->features))
                                <div class="about-check-grid">
                                    @foreach($aboutCompany->features as $feature)
                                        <div>
                                            <i class="bi bi-check2-circle"></i>
                                            {{ $feature }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- COMPANY INTRO END -->
@endif


<!-- MISSION START -->
<section class="about-mission-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">

            @if($aboutMission)
                <div class="col-lg-5">
                    <div class="about-content">

                        @if($aboutMission->tag_title)
                            <span class="about-section-tag dark">
                                @if($aboutMission->tag_icon)
                                    <i class="{{ $aboutMission->tag_icon }}"></i>
                                @endif

                                {{ $aboutMission->tag_title }}
                            </span>
                        @endif

                        <h2>{{ $aboutMission->title }}</h2>

                        @if($aboutMission->description)
                            <p>{{ $aboutMission->description }}</p>
                        @endif

                    </div>
                </div>
            @endif

            <div class="col-lg-7">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="about-feature-card">
                            <i class="bi bi-stars"></i>
                            <h4>Premium Feel</h4>
                            <p>Luxury cars that add elegance and style to every event.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="about-feature-card">
                            <i class="bi bi-clock-history"></i>
                            <h4>Timely Service</h4>
                            <p>Planned pickup and arrival coordination for smooth events.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="about-feature-card">
                            <i class="bi bi-person-badge"></i>
                            <h4>Driver Support</h4>
                            <p>Professional driver support for comfort and reliability.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="about-feature-card">
                            <i class="bi bi-headset"></i>
                            <h4>Easy Enquiry</h4>
                            <p>Quick response through call, WhatsApp and enquiry forms.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- MISSION END -->


<!-- SERVICE AREA START -->
<section class="about-area-section">
    <div class="container">
        <div class="about-premium-box">
            <div class="row align-items-center g-4">

                <div class="col-lg-7">
                    <span class="about-section-tag dark">
                        <i class="bi bi-geo-alt"></i>
                        Service Area
                    </span>

                    <h2>Serving Weddings, Events & Premium Occasions In Your Local Market</h2>

                    <p>
                        CarBookKro provides luxury cars for wedding venues, banquet halls, hotels,
                        resorts, photoshoot locations and VIP travel requirements. Availability depends
                        on event date, selected car, route and location.
                    </p>

                    <div class="area-pills">
                        <span><i class="bi bi-check2"></i> Wedding Venues</span>
                        <span><i class="bi bi-check2"></i> Banquet Halls</span>
                        <span><i class="bi bi-check2"></i> Hotels & Resorts</span>
                        <span><i class="bi bi-check2"></i> Photoshoot Locations</span>
                        <span><i class="bi bi-check2"></i> VIP Pickup & Drop</span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="area-info-card">
                        <i class="bi bi-map"></i>

                        <h3>Check Car Availability</h3>

                        <p>
                            Share your event date, location and preferred car. Our team will confirm
                            availability, pricing and decoration options.
                        </p>

                            <a href="{{ route('frontend.booking-enquiry') }}">
                            Send Booking Enquiry
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- SERVICE AREA END -->


@if(isset($specializationCards) && $specializationCards->count())
    <!-- SPECIALIZATION START -->
    <section class="about-special-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="about-section-tag dark">
                    <i class="bi bi-car-front"></i>
                    Wedding & Event Specialization
                </span>

                <h2>Specialized In Premium Wedding Car Rentals</h2>

                <p>
                    We focus on rental services for marriage functions, groom entry, bridal entry,
                    receptions, engagements, pre-wedding shoots and VIP occasions.
                </p>
            </div>

            <div class="row g-4 special-row">

                @foreach($specializationCards as $card)
                    <div class="col-md-6 col-lg-3">
                        <div class="special-card">
                            <img src="{{ $card->image_url }}"
                                 alt="{{ $card->image_alt ?? $card->title }}">

                            <div class="special-card-content">
                                @if($card->icon)
                                    <i class="{{ $card->icon }}"></i>
                                @endif

                                <h4>{{ $card->title }}</h4>

                                @if($card->description)
                                    <p>{{ $card->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- SPECIALIZATION END -->
@endif


<!-- TRUST START -->
<section class="about-trust-section">
    <div class="container">
        <div class="about-premium-box">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-5">
                    <span class="about-section-tag dark">
                        <i class="bi bi-shield-check"></i>
                        Trust Building
                    </span>

                    <h2>Trusted For Quality, Timing & Professional Support</h2>

                    <p>
                        Customers choose us because we focus on clean cars, reliable timing,
                        professional coordination and easy booking communication.
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="about-feature-card">
                                <i class="bi bi-car-front-fill"></i>
                                <h4>Clean Cars</h4>
                                <p>Cars are checked and prepared before each booking.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="about-feature-card">
                                <i class="bi bi-calendar-check"></i>
                                <h4>Event Ready</h4>
                                <p>Service planned according to date, time and location.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="about-feature-card">
                                <i class="bi bi-whatsapp"></i>
                                <h4>WhatsApp Support</h4>
                                <p>Quick enquiry and booking support through WhatsApp.</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="about-feature-card">
                                <i class="bi bi-flower1"></i>
                                <h4>Decoration Options</h4>
                                <p>Wedding decoration support available on request.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- TRUST END -->

@endsection
