// Initialize carousel with autoplay
document.addEventListener('DOMContentLoaded', function() {
    // Initialize carousel
    const carousel = new bootstrap.Carousel(document.getElementById('mainCarousel'), {
        interval: 5000, // Change slide every 5 seconds
        pause: 'hover'
    });

    // Mobile menu handling
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
        toggle: false
    });

    navbarToggler.addEventListener('click', function() {
        if (navbarCollapse.classList.contains('show')) {
            bsCollapse.hide();
        } else {
            bsCollapse.show();
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
            bsCollapse.hide();
        }
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Close mobile menu after clicking a link
                bsCollapse.hide();
            }
        });
    });

    // Add active class to current page in navigation
    const currentLocation = location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') === currentLocation) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}); 