@extends('frontend.master')

@section('content')


  <!-- GALLERY BREADCRUMB HERO START -->
<section class="gallery-dark-breadcrumb">
  <div class="container">

    <div class="gallery-breadcrumb-box text-center">

      <span class="gallery-breadcrumb-tag">
        <i class="bi bi-images"></i>
        CarBookKro Gallery
      </span>

      <h1>
        Luxury Wedding Cars &
        <span>Premium Event Moments</span>
      </h1>

      <p>
        Explore luxury cars, decorated wedding cars, groom entry moments,
        event photos and customer celebration memories.
      </p>

      <nav class="gallery-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <i class="bi bi-chevron-right"></i>
        <span>Gallery</span>
      </nav>

    </div>

  </div>
</section>
<!-- GALLERY BREADCRUMB HERO END -->


  <!-- GALLERY FILTER START -->
  <section class="gallery-filter-section">
    <div class="container">

      <div class="gallery-filter-box">
        <div class="gallery-filter-heading">
          <span>
            <i class="bi bi-funnel"></i>
            Browse Gallery Categories
          </span>

          <p>Explore wedding car entry, luxury cars, decorated cars, event photos and customer moments.</p>
        </div>

        <div class="gallery-filter-tabs">
          <button type="button" class="active">All Photos</button>
          @foreach($galleryCategories as $category)
            <button type="button">{{ $category }}</button>
          @endforeach
        </div>
      </div>

    </div>
  </section>
  <!-- GALLERY FILTER END -->


  <!-- GALLERY GRID START -->
  <section class="gallery-grid-section">
    <div class="container">

      <div class="section-heading text-center">
        <span class="gallery-section-tag">
          <i class="bi bi-stars"></i>
          Premium Photo Gallery
        </span>

        <h2>Wedding Cars & Event Highlights</h2>

        <p>
          A visual collection of premium cars, decorated wedding entries and luxury
          moments created for special occasions.
        </p>
      </div>

      <div class="row g-4 gallery-row">

        @foreach($galleryItems as $item)
          @php
            $columnClass = $item->card_size === 'small' ? 'col-md-6 col-lg-3' : 'col-md-6 col-lg-4';
          @endphp
          <div class="{{ $columnClass }}">
            <a href="{{ route('frontend.gallery') }}"
               class="gallery-card {{ $item->card_size }}"
               data-bs-toggle="modal"
               data-bs-target="#galleryModal"
               data-gallery-image="{{ $item->image_src }}"
               data-gallery-alt="{{ $item->image_alt ?? $item->title }}">
              <img src="{{ $item->image_src }}" alt="{{ $item->image_alt ?? $item->title }}">

              <div class="gallery-card-overlay">
                <span>{{ $item->category }}</span>
                <h3>{{ $item->title }}</h3>
                <i class="bi bi-plus-lg"></i>
              </div>
            </a>
          </div>
        @endforeach

      </div>

    </div>
  </section>
  <!-- GALLERY GRID END -->


  <!-- GALLERY FEATURE START -->
  <section class="gallery-feature-section">
    <div class="container">

      <div class="gallery-feature-box">
        <div class="row align-items-center g-4 g-lg-5">

          <div class="col-lg-6">
            <div class="gallery-feature-image">
              <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=1200&q=80"
                alt="Luxury car for premium events">

              <span>
                <i class="bi bi-gem"></i>
                Premium Event Moments
              </span>
            </div>
          </div>

          <div class="col-lg-6">
            <span class="gallery-section-tag">
              <i class="bi bi-camera"></i>
              Real Event Style
            </span>

            <h2>Capture Your Celebration With A Premium Luxury Car</h2>

            <p>
              Our cars add a royal and premium touch to wedding entry, bridal arrival,
              receptions, engagements and pre-wedding shoots. Every event deserves a
              car that looks memorable in photos and feels comfortable in experience.
            </p>

            <div class="gallery-feature-list">
              <div><i class="bi bi-check2-circle"></i> Decorated car photos</div>
              <div><i class="bi bi-check2-circle"></i> Premium event moments</div>
              <div><i class="bi bi-check2-circle"></i> Wedding entry highlights</div>
              <div><i class="bi bi-check2-circle"></i> Photoshoot ready cars</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- GALLERY FEATURE END -->


  <!-- GALLERY CTA START -->
  <section class="gallery-cta-section">
    <div class="container">

      <div class="gallery-cta-box">
        <div>
          <span class="gallery-page-tag">
            <i class="bi bi-calendar-check"></i>
            Like What You See?
          </span>

          <h2>Book A Luxury Car For Your Next Wedding Or Event</h2>

          <p>
            Share your event details and our team will suggest the best luxury car
            with availability, pricing and decoration options.
          </p>
        </div>

        <div class="gallery-cta-actions">
          <a href="{{ route('frontend.booking-enquiry') }}" class="btn gallery-btn-primary">
            Send Enquiry
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="https://wa.me/919999999999" target="_blank" class="btn gallery-btn-outline">
            WhatsApp Now
            <i class="bi bi-whatsapp"></i>
          </a>
        </div>
      </div>

    </div>
  </section>
  <!-- GALLERY CTA END -->


  <!-- GALLERY MODAL START -->
  <div class="modal fade gallery-modal" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">

        <button type="button" class="gallery-modal-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </button>

        <img id="galleryModalImage" src="{{ optional($galleryItems->first())->image_src ?? 'https://images.unsplash.com/photo-1549927681-0b673b8243ab?auto=format&fit=crop&w=1600&q=80' }}"
          alt="Luxury wedding car preview">

      </div>
    </div>
  </div>
  <!-- GALLERY MODAL END -->

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const modalImage = document.getElementById('galleryModalImage');
      document.querySelectorAll('[data-gallery-image]').forEach(function (card) {
        card.addEventListener('click', function () {
          modalImage.src = card.dataset.galleryImage;
          modalImage.alt = card.dataset.galleryAlt || 'Gallery image';
        });
      });
    });
  </script>

  @endsection
