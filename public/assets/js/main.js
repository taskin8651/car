// ===============================
// CARBOOKKRO MAIN JS
// ===============================

// Sticky Header
const siteHeader = document.getElementById("siteHeader");

window.addEventListener("scroll", function () {
    if (window.scrollY > 60) {
        siteHeader.classList.add("sticky");
    } else {
        siteHeader.classList.remove("sticky");
    }
});

// Close mobile menu after nav click
const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
const navbarCollapse = document.querySelector(".navbar-collapse");

navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
        if (navbarCollapse && navbarCollapse.classList.contains("show")) {
            const bsCollapse = new bootstrap.Collapse(navbarCollapse);
            bsCollapse.hide();
        }
    });
});






// ===============================
// HERO CAROUSEL
// ===============================

document.addEventListener("DOMContentLoaded", function () {
  const heroCarousel = document.querySelector("#heroCarousel");

  if (heroCarousel) {
    new bootstrap.Carousel(heroCarousel, {
      interval: 9000,
      ride: "carousel",
      pause: false,
      wrap: true,
      touch: true
    });
  }
});