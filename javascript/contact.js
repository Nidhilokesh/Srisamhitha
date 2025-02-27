document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form values
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const message = document.getElementById('message').value.trim();

    // Basic validation
    if (!firstName || !lastName || !email || !phone || !message) {
        Swal.fire({
            icon: 'warning',
            title: 'Missing Information',
            text: 'Please fill in all fields.',
        });
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Email',
            text: 'Please enter a valid email address.',
        });
        return;
    }

    // Phone validation (allows digits, spaces, dashes, and optional + at the start)
    const phoneRegex = /^\+?[\d\s-]{10,}$/;
    if (!phoneRegex.test(phone)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Phone Number',
            text: 'Please enter a valid phone number.',
        });
        return;
    }

    // AJAX request to submit the form data
    let formData = new FormData(document.getElementById('contactForm'));
    
    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire({
            icon: data.status === 'success' ? 'success' : 'error',
            title: data.status === 'success' ? 'Message Sent!' : 'Error',
            text: data.message,
        }).then(() => {
            if (data.status === 'success') {
                document.getElementById('contactForm').reset();
            }
        });
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'Please try again later.',
        });
    });
});

// Adjust scrolling behavior for mobile devices
window.addEventListener('resize', function () {
    if (window.innerWidth < 480) {
        document.body.style.zoom = '100%'; // Prevents zooming issues on mobile
    }
});

// Smooth animations for elements appearing on scroll
document.addEventListener('DOMContentLoaded', function () {
    const elementsToAnimate = document.querySelectorAll(
        '.contact-features .feature, .contact-section, .map-container, .cta-section'
    );

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    elementsToAnimate.forEach((el) => observer.observe(el));
});
