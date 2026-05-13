<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $websiteSetting->meta_title ?? 'CarBookKro | Premium Luxury Wedding Car Rental Service' }}</title>
    <meta name="description" content="{{ $websiteSetting->meta_description ?? 'Book luxury wedding cars for groom entry, bridal entry, reception, engagement and premium events.' }}" />
    @if(!empty($websiteSetting?->meta_keywords))
        <meta name="keywords" content="{{ $websiteSetting->meta_keywords }}" />
    @endif
    @if(!empty($websiteSetting?->favicon_src))
        <link rel="icon" href="{{ $websiteSetting->favicon_src }}">
        <link rel="shortcut icon" href="{{ $websiteSetting->favicon_src }}">
    @endif
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

   <!-- HEADER START -->
    <header class="site-header" id="siteHeader">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">

                <!-- LOGO -->
                <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                    @if(!empty($websiteSetting?->logo_src))
                        <span class="brand-icon">
                            <img src="{{ $websiteSetting->logo_src }}" alt="{{ $websiteSetting->site_name ?? 'CarBookKro' }}" style="height:42px;width:auto;object-fit:contain;">
                        </span>
                    @endif

                    <span class="brand-text">
                        {{ $websiteSetting->site_name ?? 'CarBookKro' }}
                        <small>{{ $websiteSetting->tagline ?? 'Luxury Wedding Cars' }}</small>
                    </span>
                </a>

                <!-- MOBILE TOGGLER -->
                <button class="navbar-toggler custom-toggler shadow-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- NAVIGATION -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto align-items-lg-center header-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.cars') || request()->routeIs('frontend.cars.show') ? 'active' : '' }}" href="{{ route('frontend.cars') }}">Cars</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.services') ? 'active' : '' }}" href="{{ route('frontend.services') }}">Services</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.gallery') ? 'active' : '' }}" href="{{ route('frontend.gallery') }}">Gallery</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- HEADER ACTION -->
                    <div class="header-action">
                        <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone ?? '+919999999999') }}" class="header-call">
                            <i class="bi bi-telephone-fill"></i>
                            <span>Call Now</span>
                        </a>

                        <a href="{{ route('frontend.booking-enquiry') }}" class="btn btn-header-gold">
                            Book Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    <!-- HEADER END -->


    @yield('content')



    
   <!-- FOOTER START -->
    <footer class="premium-footer-section">
        <div class="container">

            <div class="footer-premium-box">

                <div class="row g-4">

                    <!-- BRAND -->
                    <div class="col-lg-4">
                        <div class="footer-brand-area">

                            <a class="footer-brand" href="{{ route('frontend.home') }}">
                                <!-- <span class="footer-brand-icon">
                                    <i class="bi bi-car-front-fill"></i>
                                </span> -->

                                <span>
                                    {{ $websiteSetting->site_name ?? 'CarBookKro' }}
                                    <small>{{ $websiteSetting->tagline ?? 'Luxury Wedding Cars' }}</small>
                                </span>
                            </a>

                            <p>
                                Premium luxury wedding car rental service for groom entry,
                                bridal entry, reception, pre-wedding shoots and VIP events.
                            </p>

                            <div class="social-links">
                                <a href="{{ !empty($websiteSetting?->facebook_url) && $websiteSetting->facebook_url !== '#' ? $websiteSetting->facebook_url : route('frontend.home') }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="{{ !empty($websiteSetting?->instagram_url) && $websiteSetting->instagram_url !== '#' ? $websiteSetting->instagram_url : route('frontend.home') }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="{{ !empty($websiteSetting?->youtube_url) && $websiteSetting->youtube_url !== '#' ? $websiteSetting->youtube_url : route('frontend.home') }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                                <a href="{{ !empty($websiteSetting?->whatsapp_url) && $websiteSetting->whatsapp_url !== '#' ? $websiteSetting->whatsapp_url : 'https://wa.me/919999999999' }}" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>

                        </div>
                    </div>

                    <!-- QUICK LINKS -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4>Quick Links</h4>

                            <ul>
                                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                <li><a href="{{ route('frontend.cars') }}">Cars</a></li>
                                <li><a href="{{ route('frontend.services') }}">Services</a></li>
                                <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- SERVICES -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4>Services</h4>

                            <ul>
                                <li><a href="{{ route('frontend.services') }}">Groom Entry Car</a></li>
                                <li><a href="{{ route('frontend.services') }}">Bridal Entry Car</a></li>
                                <li><a href="{{ route('frontend.services') }}">Wedding Car Rental</a></li>
                                <li><a href="{{ route('frontend.services') }}">Pre-Wedding Shoot</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <h4>Contact Info</h4>

                            <div class="footer-contact">
                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ $websiteSetting->business_address ?? 'Your Business Address, India' }}</span>
                                </p>

                                <p>
                                    <i class="bi bi-telephone"></i>
                                    <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone ?? '+919999999999') }}">{{ $websiteSetting->phone ?? '+91 99999 99999' }}</a>
                                </p>

                                <p>
                                    <i class="bi bi-envelope"></i>
                                    <a href="mailto:{{ $websiteSetting->email ?? 'info@carbookkro.com' }}">{{ $websiteSetting->email ?? 'info@carbookkro.com' }}</a>
                                </p>

                                <p>
                                    <i class="bi bi-clock"></i>
                                    <span>{{ $websiteSetting->opening_hours ?? 'Mon - Sun: 9:00 AM - 9:00 PM' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="footer-bottom">
                    <p>© {{ now()->year }} {{ $websiteSetting->site_name ?? 'CarBookKro' }}. All Rights Reserved.</p>

                    <div class="footer-bottom-links">
                        <a href="{{ !empty($websiteSetting?->privacy_policy_url) && $websiteSetting->privacy_policy_url !== '#' ? $websiteSetting->privacy_policy_url : route('frontend.home') }}">Privacy Policy</a>
                        <a href="{{ !empty($websiteSetting?->terms_url) && $websiteSetting->terms_url !== '#' ? $websiteSetting->terms_url : route('frontend.home') }}">Terms & Conditions</a>
                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- FOOTER END -->


    <!-- FLOATING BUTTONS START -->
    <div class="floating-actions">

        <a href="tel:{{ preg_replace('/\s+/', '', $websiteSetting->phone ?? '+919999999999') }}" class="float-btn call-btn" aria-label="Call Now">
            <span class="float-label">Call Now</span>
            <i class="bi bi-telephone-fill"></i>
        </a>

        <a href="{{ $websiteSetting->whatsapp_url ?? 'https://wa.me/919999999999' }}" target="_blank" class="float-btn whatsapp-btn" aria-label="WhatsApp">
            <span class="float-label">WhatsApp</span>
            <i class="bi bi-whatsapp"></i>
        </a>

    </div>
    <!-- FLOATING BUTTONS END -->



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>


