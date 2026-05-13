@extends('frontend.master')

@section('content')


<!-- CONTACT BREADCRUMB HERO START -->
<section class="contact-dark-breadcrumb">
  <div class="container">

    <div class="contact-breadcrumb-box text-center">

      <span class="contact-breadcrumb-tag">
        <i class="bi bi-headset"></i>
        Contact CarBookKro
      </span>

      <h1>
        Book Your Luxury Car For
        <span>Wedding & Premium Events</span>
      </h1>

      <p>
        Share your event date, location and preferred car. Our team will help
        you with availability, pricing, decoration options and booking support.
      </p>

      <nav class="contact-breadcrumb-nav" aria-label="breadcrumb">
        <a href="index.html">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Contact</span>
      </nav>

    </div>

  </div>
</section>
<!-- CONTACT BREADCRUMB HERO END -->


    <!-- CONTACT INFO START -->
    <section class="contact-info-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="contact-section-tag">
                    <i class="bi bi-info-circle"></i>
                    Get In Touch
                </span>

                <h2>Contact Details & Booking Support</h2>

                <p>
                    Reach us directly for wedding car rental, groom entry car booking,
                    bridal entry car service and premium event car availability.
                </p>
            </div>

            <div class="row g-4 contact-info-row">

                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Business Address</h3>
                        <p>Your Business Address, City, State, India</p>
                        <a href="#contactMap">View Map</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <i class="bi bi-telephone"></i>
                        <h3>Mobile Number</h3>
                        <p>+91 99999 99999</p>
                        <a href="tel:+919999999999">Call Now</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <i class="bi bi-whatsapp"></i>
                        <h3>WhatsApp</h3>
                        <p>+91 99999 99999</p>
                        <a href="https://wa.me/919999999999" target="_blank">Chat Now</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Address</h3>
                        <p>info@carbookkro.com</p>
                        <a href="mailto:info@carbookkro.com">Send Mail</a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- CONTACT INFO END -->


    <!-- CONTACT FORM START -->
    <section class="contact-form-section">
        <div class="container">

            <div class="contact-form-box">
                <div class="row align-items-stretch g-4 g-lg-5">

                    <div class="col-lg-5">
                        <div class="contact-form-left">
                            <span class="contact-section-tag">
                                <i class="bi bi-chat-dots"></i>
                                Send Enquiry
                            </span>

                            <h2>Tell Us About Your Wedding Or Event</h2>

                            <p>
                                Fill the form with your event details. Our team will contact you
                                with car availability, price and decoration options.
                            </p>

                            <div class="contact-mini-list">
                                <div><i class="bi bi-check2-circle"></i> Quick response on WhatsApp</div>
                                <div><i class="bi bi-check2-circle"></i> Car availability confirmation</div>
                                <div><i class="bi bi-check2-circle"></i> Decoration options on request</div>
                                <div><i class="bi bi-check2-circle"></i> Driver included support</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form class="contact-form">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>

                                <div class="col-md-6">
                                    <label>Mobile Number</label>
                                    <input type="tel" class="form-control" placeholder="+91 99999 99999">
                                </div>

                                <div class="col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter email address">
                                </div>

                                <div class="col-md-6">
                                    <label>Event Type</label>
                                    <select class="form-select">
                                        <option selected>Select Event Type</option>
                                        <option>Groom Entry</option>
                                        <option>Bridal Entry</option>
                                        <option>Wedding Car Rental</option>
                                        <option>Reception</option>
                                        <option>Pre-Wedding Shoot</option>
                                        <option>VIP Pickup & Drop</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Event Date</label>
                                    <input type="date" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Preferred Car</label>
                                    <select class="form-select">
                                        <option selected>Select Preferred Car</option>
                                        <option>BMW 5 Series</option>
                                        <option>Mercedes Benz</option>
                                        <option>Audi A6</option>
                                        <option>Vintage Wedding Car</option>
                                        <option>Sports Car</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Pickup Location</label>
                                    <input type="text" class="form-control" placeholder="Enter pickup location">
                                </div>

                                <div class="col-md-6">
                                    <label>Decoration Required?</label>
                                    <select class="form-select">
                                        <option selected>Select Option</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Need Suggestions</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label>Message / Requirement</label>
                                    <textarea class="form-control" rows="5"
                                        placeholder="Tell us about your event date, venue, route and special requirement"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn contact-submit-btn">
                                        Submit Enquiry
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
    <!-- CONTACT FORM END -->


    <!-- BUSINESS HOURS START -->
    <section class="contact-hours-section">
        <div class="container">

            <div class="contact-hours-box">
                <div class="row align-items-center g-4">

                    <div class="col-lg-5">
                        <span class="contact-section-tag">
                            <i class="bi bi-clock"></i>
                            Business Hours
                        </span>

                        <h2>Available For Wedding & Event Enquiries</h2>

                        <p>
                            Contact us for car availability, booking details, pricing,
                            decoration support and event coordination.
                        </p>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-hours-grid">

                            <div>
                                <i class="bi bi-calendar-week"></i>
                                <h4>Monday - Friday</h4>
                                <span>9:00 AM - 9:00 PM</span>
                            </div>

                            <div>
                                <i class="bi bi-calendar-heart"></i>
                                <h4>Saturday - Sunday</h4>
                                <span>9:00 AM - 10:00 PM</span>
                            </div>

                            <div>
                                <i class="bi bi-whatsapp"></i>
                                <h4>WhatsApp Support</h4>
                                <span>Quick enquiry support</span>
                            </div>

                            <div>
                                <i class="bi bi-telephone"></i>
                                <h4>Urgent Booking</h4>
                                <span>Call for availability</span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- BUSINESS HOURS END -->


    <!-- MAP START -->
    <section class="contact-map-section" id="contactMap">
        <div class="container">

            <div class="contact-map-box">
                <div class="map-heading">
                    <span class="contact-section-tag">
                        <i class="bi bi-map"></i>
                        Find Us On Map
                    </span>

                    <h2>Visit Or Contact Our Booking Team</h2>

                    <p>
                        Replace this iframe with your actual Google Map embed location.
                    </p>
                </div>

                <div class="map-frame">
                    <iframe src="https://www.google.com/maps?q=India&output=embed" width="100%" height="450"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

        </div>
    </section>
    <!-- MAP END -->


    <!-- CONTACT CTA START -->
    <section class="contact-cta-section">
        <div class="container">

            <div class="contact-cta-box">
                <div>
                    <span class="contact-page-tag">
                        <i class="bi bi-calendar-check"></i>
                        Ready To Book?
                    </span>

                    <h2>Need A Luxury Car For Your Wedding Or Event?</h2>

                    <p>
                        Call us or send a WhatsApp message with your event date and location.
                        Our team will guide you with the best available luxury cars.
                    </p>
                </div>

                <div class="contact-cta-actions">
                    <a href="tel:+919999999999" class="btn contact-btn-primary">
                        Call Now
                        <i class="bi bi-telephone"></i>
                    </a>

                    <a href="https://wa.me/919999999999" target="_blank" class="btn contact-btn-outline">
                        WhatsApp Now
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- CONTACT CTA END -->

@endsection