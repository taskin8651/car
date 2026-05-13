@extends('frontend.master')

@section('content')


    <!-- HERO START -->
    <section class="hero-section">
        <div id="heroCarousel" class="carousel slide carousel-fade">

            <!-- INDICATORS -->
            <div class="carousel-indicators premium-indicators">
                @foreach($heroSlides as $index => $slide)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"
                        @if($index === 0) aria-current="true" @endif
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">

                @foreach($heroSlides as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="hero-slide"
                        style="background-image: url('{{ $slide->background_image_src }}');">

                        <div class="hero-overlay"></div>

                        <div class="container">
                            <div class="row hero-row align-items-center g-4">

                                <div class="col-lg-6 col-md-10">
                                    <div class="hero-content">

                                        <span class="hero-tag">
                                            <i class="{{ $slide->tag_icon ?: 'bi bi-stars' }}"></i>
                                            {{ $slide->tag_title }}
                                        </span>

                                        <h1>
                                            {{ $slide->title }}
                                            @if($slide->title_highlight)
                                                <span>{{ $slide->title_highlight }}</span>
                                            @endif
                                        </h1>

                                        <p>{{ $slide->description }}</p>

                                        <div class="hero-buttons">
                                            @if($slide->primary_button_text && $slide->primary_button_url)
                                                <a href="{{ $slide->primary_button_url }}" class="btn hero-btn-primary">
                                                    {{ $slide->primary_button_text }}
                                                    <i class="{{ $slide->primary_button_icon ?: 'bi bi-arrow-right' }}"></i>
                                                </a>
                                            @endif

                                            @if($slide->secondary_button_text && $slide->secondary_button_url)
                                                <a href="{{ $slide->secondary_button_url }}" class="btn hero-btn-glass">
                                                    {{ $slide->secondary_button_text }}
                                                    <i class="{{ $slide->secondary_button_icon ?: 'bi bi-car-front' }}"></i>
                                                </a>
                                            @endif
                                        </div>

                                        @if(!empty($slide->trust_items))
                                        <div class="hero-trust">
                                            @foreach($slide->trust_items as $trustItem)
                                                <div class="hero-trust-card">
                                                    <h4>{{ $trustItem['number'] ?? '' }}</h4>
                                                    <span>{{ $trustItem['label'] ?? '' }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="hero-car-showcase">
                                        <div class="hero-car-frame">
                                            <img src="{{ $slide->showcase_image_src }}" alt="{{ $slide->image_alt ?: $slide->title }}">
                                            @if($slide->badge_title)
                                                <span class="hero-car-badge">
                                                    <i class="{{ $slide->badge_icon ?: 'bi bi-gem' }}"></i>
                                                    {{ $slide->badge_title }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>

            <!-- ARROWS -->
            <button class="carousel-control-prev premium-arrow" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="prev" aria-label="Previous slide">
                <i class="bi bi-arrow-left"></i>
            </button>

            <button class="carousel-control-next premium-arrow" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="next" aria-label="Next slide">
                <i class="bi bi-arrow-right"></i>
            </button>

        </div>
    </section>
    <!-- HERO END -->


    <!-- ABOUT INTRO START -->
    <section class="about-intro">
        <div class="container">
            <div class="about-premium-box">

                <div class="row align-items-center g-4 g-lg-5">

                    <!-- LEFT IMAGE -->
                    <div class="col-lg-6">
                        <div class="about-image-wrap">
                            <img src="https://images.unsplash.com/photo-1603386329225-868f9b1ee6c9?auto=format&fit=crop&w=1200&q=80"
                                alt="Luxury wedding car" class="img-fluid">

                            <div class="experience-card">
                                <h3>10+</h3>
                                <p>Years of Premium Event Service</p>
                            </div>

                            <div class="about-image-badge">
                                <i class="bi bi-gem"></i>
                                <span>Luxury Wedding Fleet</span>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="col-lg-6">
                        <div class="about-content">

                            <span class="section-tag dark">
                                <i class="bi bi-info-circle"></i>
                                About CarBookKro
                            </span>

                            <h2 class="section-title">
                                Premium Cars For Wedding, Events & Royal Entries
                            </h2>

                            <p class="section-text">
                                CarBookKro provides luxury wedding cars for customers who want a stylish,
                                comfortable and unforgettable experience for their special day.
                            </p>

                            <div class="about-features">
                                <div class="feature-mini">
                                    <i class="bi bi-car-front-fill"></i>
                                    <span>Luxury Car Fleet</span>
                                </div>

                                <div class="feature-mini">
                                    <i class="bi bi-flower1"></i>
                                    <span>Decorated Cars</span>
                                </div>

                                <div class="feature-mini">
                                    <i class="bi bi-person-badge"></i>
                                    <span>Driver Included</span>
                                </div>

                                <div class="feature-mini">
                                    <i class="bi bi-headset"></i>
                                    <span>Fast Booking Support</span>
                                </div>
                            </div>

                            <div class="about-actions">
                                <a href="{{ route('frontend.about') }}" class="btn btn-dark-premium">
                                    Know More
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>

                                <a href="{{ route('frontend.cars') }}" class="about-link">
                                    View Premium Cars
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ABOUT INTRO END -->


    <!-- FEATURED CARS START -->
    <section class="featured-cars-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="section-tag dark">
                    <i class="bi bi-car-front"></i>
                    Featured Cars
                </span>

                <h2 class="section-title">Choose Your Dream Wedding Car</h2>

                <p class="section-text mx-auto">
                    Browse our premium collection of luxury cars available for weddings,
                    receptions, groom entry and premium events.
                </p>
            </div>

            <div class="row g-4 featured-cars-row">

                <!-- CAR CARD 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="car-card">
                        <div class="car-img">
                            <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=900&q=80"
                                alt="BMW 5 Series">

                            <span class="car-badge">Luxury Sedan</span>

                            <div class="car-img-overlay">
                                <a href="{{ route('frontend.cars') }}">
                                    View Details
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="car-content">
                            <div class="car-title-row">
                                <h3>BMW 5 Series</h3>
                                <span class="car-rating">
                                    <i class="bi bi-star-fill"></i>
                                    4.9
                                </span>
                            </div>

                            <ul>
                                <li><i class="bi bi-people"></i> 4+1 Seating</li>
                                <li><i class="bi bi-palette"></i> Decoration Available</li>
                                <li><i class="bi bi-person-badge"></i> Driver Included</li>
                            </ul>

                            <div class="car-footer">
                                <div>
                                    <small>Starting From</small>
                                    <span>₹9,999</span>
                                </div>

                                <a href="{{ route('frontend.booking-enquiry') }}" class="car-book-btn">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CAR CARD 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="car-card">
                        <div class="car-img">
                            <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=900&q=80"
                                alt="Mercedes Benz">

                            <span class="car-badge">Premium SUV</span>

                            <div class="car-img-overlay">
                                <a href="{{ route('frontend.cars') }}">
                                    View Details
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="car-content">
                            <div class="car-title-row">
                                <h3>Mercedes Benz</h3>
                                <span class="car-rating">
                                    <i class="bi bi-star-fill"></i>
                                    5.0
                                </span>
                            </div>

                            <ul>
                                <li><i class="bi bi-people"></i> 4+1 Seating</li>
                                <li><i class="bi bi-calendar-check"></i> Wedding Ready</li>
                                <li><i class="bi bi-geo-alt"></i> Local Booking</li>
                            </ul>

                            <div class="car-footer">
                                <div>
                                    <small>Price</small>
                                    <span>On Enquiry</span>
                                </div>

                                <a href="{{ route('frontend.booking-enquiry') }}" class="car-book-btn">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CAR CARD 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="car-card">
                        <div class="car-img">
                            <img src="https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?auto=format&fit=crop&w=900&q=80"
                                alt="Premium Sports Car">

                            <span class="car-badge">Sports Car</span>

                            <div class="car-img-overlay">
                                <a href="{{ route('frontend.cars') }}">
                                    View Details
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="car-content">
                            <div class="car-title-row">
                                <h3>Premium Sports Car</h3>
                                <span class="car-rating">
                                    <i class="bi bi-star-fill"></i>
                                    4.8
                                </span>
                            </div>

                            <ul>
                                <li><i class="bi bi-camera"></i> Photoshoot</li>
                                <li><i class="bi bi-stars"></i> Groom Entry</li>
                                <li><i class="bi bi-lightning"></i> Luxury Experience</li>
                            </ul>

                            <div class="car-footer">
                                <div>
                                    <small>Price</small>
                                    <span>On Enquiry</span>
                                </div>

                                <a href="{{ route('frontend.booking-enquiry') }}" class="car-book-btn">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="featured-cars-action text-center">
                <a href="{{ route('frontend.cars') }}" class="btn btn-gold">
                    View All Cars
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

        </div>
    </section>
    <!-- FEATURED CARS END -->


    <!-- SERVICES START -->
    <section class="premium-services-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="section-tag dark">
                    <i class="bi bi-gem"></i>
                    Our Services
                </span>

                <h2 class="section-title">Luxury Car Rental Services</h2>

                <p class="section-text mx-auto">
                    Premium rental services designed for weddings, family events,
                    corporate occasions and unforgettable celebrations.
                </p>
            </div>

            <div class="row g-4 premium-services-row">

                <!-- SERVICE 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-stars"></i>
                        </div>

                        <span class="service-count">01</span>

                        <h3>Groom Entry Car</h3>

                        <p>
                            Royal luxury car entry for the groom on wedding day.
                        </p>

                        <a href="{{ route('frontend.services') }}" class="service-link">
                            Explore
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>

                <!-- SERVICE 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-heart"></i>
                        </div>

                        <span class="service-count">02</span>

                        <h3>Bridal Entry Car</h3>

                        <p>
                            Elegant decorated car service for bridal entry moments.
                        </p>

                        <a href="{{ route('frontend.services') }}" class="service-link">
                            Explore
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>

                <!-- SERVICE 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-camera"></i>
                        </div>

                        <span class="service-count">03</span>

                        <h3>Pre-Wedding Shoot</h3>

                        <p>
                            Luxury cars for premium couple photoshoot concepts.
                        </p>

                        <a href="{{ route('frontend.services') }}" class="service-link">
                            Explore
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>

                <!-- SERVICE 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>

                        <span class="service-count">04</span>

                        <h3>VIP Pickup Drop</h3>

                        <p>
                            Premium transport for guests, events and corporate use.
                        </p>

                        <a href="{{ route('frontend.services') }}" class="service-link">
                            Explore
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- SERVICES END -->


    <!-- WHY CHOOSE START -->
    <section class="premium-why-section">
        <div class="container">

            <div class="why-premium-box">
                <div class="row align-items-center g-4 g-lg-5">

                    <!-- LEFT CONTENT -->
                    <div class="col-lg-5">
                        <div class="why-content">
                            <span class="section-tag dark">
                                <i class="bi bi-shield-check"></i>
                                Why Choose Us
                            </span>

                            <h2 class="section-title">
                                Trusted Luxury Car Rental For Special Events
                            </h2>

                            <p class="section-text">
                                We focus on clean cars, professional service, timely arrival,
                                driver support and smooth booking experience.
                            </p>

                            <div class="why-mini-stats">
                                <div>
                                    <h4>500+</h4>
                                    <span>Events Served</span>
                                </div>

                                <div>
                                    <h4>50+</h4>
                                    <span>Premium Cars</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT CARDS -->
                    <div class="col-lg-7">
                        <div class="row g-3 why-card-row">

                            <div class="col-md-6">
                                <div class="why-card">
                                    <div class="why-icon">
                                        <i class="bi bi-car-front-fill"></i>
                                    </div>

                                    <h4>Premium Fleet</h4>
                                    <p>Luxury sedans, SUVs, sports cars and vintage cars.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="why-card">
                                    <div class="why-icon">
                                        <i class="bi bi-clock-history"></i>
                                    </div>

                                    <h4>Timely Service</h4>
                                    <p>Reliable pickup and event timing coordination.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="why-card">
                                    <div class="why-icon">
                                        <i class="bi bi-flower1"></i>
                                    </div>

                                    <h4>Decoration Support</h4>
                                    <p>Wedding decoration available as per requirement.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="why-card">
                                    <div class="why-icon">
                                        <i class="bi bi-headset"></i>
                                    </div>

                                    <h4>Quick Enquiry</h4>
                                    <p>Call, WhatsApp and enquiry form support.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- WHY CHOOSE END -->


    <!-- GALLERY START -->
    <section class="premium-gallery-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="section-tag dark">
                    <i class="bi bi-images"></i>
                    Gallery
                </span>

                <h2 class="section-title">Wedding Cars & Event Moments</h2>

                <p class="section-text mx-auto">
                    A glimpse of luxury cars, decorated wedding cars and premium event moments.
                </p>
            </div>

            <div class="row g-4 premium-gallery-row">

                <!-- GALLERY ITEM 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=700&q=80"
                            alt="Luxury wedding car">

                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <span>Luxury Cars</span>
                                <h4>Premium Wedding Fleet</h4>
                                <a href="{{ route('frontend.gallery') }}">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GALLERY ITEM 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1549927681-0b673b8243ab?auto=format&fit=crop&w=700&q=80"
                            alt="Decorated wedding car">

                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <span>Wedding Entry</span>
                                <h4>Royal Groom Arrival</h4>
                                <a href="{{ route('frontend.gallery') }}">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GALLERY ITEM 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c?auto=format&fit=crop&w=700&q=80"
                            alt="Premium event car">

                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <span>Event Moments</span>
                                <h4>Luxury Celebration</h4>
                                <a href="{{ route('frontend.gallery') }}">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GALLERY ITEM 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=700&q=80"
                            alt="Sports car for photoshoot">

                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <span>Photoshoot</span>
                                <h4>Premium Car Shoot</h4>
                                <a href="{{ route('frontend.gallery') }}">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="gallery-action text-center">
                <a href="{{ route('frontend.gallery') }}" class="btn btn-gold">
                    View Full Gallery
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

        </div>
    </section>
    <!-- GALLERY END -->


    <!-- TESTIMONIALS START -->
    <section class="premium-testimonials-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="section-tag">
                    <i class="bi bi-chat-quote"></i>
                    Testimonials
                </span>

                <h2 class="section-title light">What Our Customers Say</h2>

                <p class="section-text light mx-auto">
                    Real experiences from customers who trusted our luxury cars
                    for weddings, receptions and premium events.
                </p>
            </div>

            <div class="row g-4 premium-testimonials-row">

                @foreach($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <div class="testimonial-card">

                            <div class="testimonial-top">
                                <div class="quote-icon">
                                    <i class="bi bi-quote"></i>
                                </div>

                                <div class="stars">
                                    @for($star = 1; $star <= $testimonial->rating; $star++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                            </div>

                            <p>"{{ $testimonial->message }}"</p>

                            <div class="client-info">
                                <div class="client-avatar">{{ $testimonial->avatar_text ?: strtoupper(substr($testimonial->client_name, 0, 1)) }}</div>

                                <div>
                                    <h5>{{ $testimonial->client_name }}</h5>
                                    <span>{{ $testimonial->event_type }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

                @if(false)
                <!-- TESTIMONIAL 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">

                        <div class="testimonial-top">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>

                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>

                        <p>
                            “The car was clean, decorated beautifully and arrived on time.
                            Perfect service for my wedding entry.”
                        </p>

                        <div class="client-info">
                            <div class="client-avatar">R</div>

                            <div>
                                <h5>Rahul Sharma</h5>
                                <span>Wedding Event</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- TESTIMONIAL 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">

                        <div class="testimonial-top">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>

                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>

                        <p>
                            “Very premium experience. Booking was easy and the team helped us
                            choose the right car.”
                        </p>

                        <div class="client-info">
                            <div class="client-avatar">A</div>

                            <div>
                                <h5>Ankit Verma</h5>
                                <span>Reception Event</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- TESTIMONIAL 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">

                        <div class="testimonial-top">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>

                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>

                        <p>
                            “Best luxury car rental experience for our pre-wedding shoot.
                            Highly recommended.”
                        </p>

                        <div class="client-info">
                            <div class="client-avatar">P</div>

                            <div>
                                <h5>Priya Singh</h5>
                                <span>Pre-Wedding Shoot</span>
                            </div>
                        </div>

                    </div>
                </div>

                @endif
            </div>

        </div>
    </section>
    <!-- TESTIMONIALS END -->


    <!-- CTA START -->
    <section class="premium-cta-section">
        <div class="container">

            <div class="premium-cta-box">

                <div class="cta-content">
                    <span class="section-tag">
                        <i class="bi bi-calendar-check"></i>
                        Ready To Book?
                    </span>

                    <h2>Need A Luxury Car For Your Wedding?</h2>

                    <p>
                        Send your event details and our team will contact you with availability,
                        pricing and decoration options.
                    </p>
                </div>

                <div class="cta-actions">
                    <a href="{{ route('frontend.booking-enquiry') }}" class="btn cta-btn-gold">
                        Send Enquiry
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="https://wa.me/919999999999" target="_blank" class="btn cta-btn-glass">
                        WhatsApp Now
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>

            </div>

        </div>
    </section>
    <!-- CTA END -->

@endsection
