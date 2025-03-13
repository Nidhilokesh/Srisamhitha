document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    // Observe all elements with animation class
    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Initial animation for already visible elements
    setTimeout(() => {
        document.querySelectorAll('.animate-on-scroll').forEach(element => {
            if (isElementInViewport(element)) {
                element.classList.add('visible');
                observer.unobserve(element);
            }
        });
    }, 100);

    // Form submission with animation
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Add sending animation to button
        const submitBtn = contactForm.querySelector('.btn');
        submitBtn.innerText = 'Sending...';
        submitBtn.style.opacity = '0.7';
        submitBtn.disabled = true;
        
        // Get form data
        const formData = new FormData(contactForm);
        const formObject = {};
        formData.forEach((value, key) => {
            formObject[key] = value;
        });

        // Simulate form submission
        setTimeout(() => {
            // Normally you would send this data to a server
            console.log('Form data:', formObject);
            
            // Show success message
            successMessage.style.display = 'block';
            errorMessage.style.display = 'none';
            
            // Reset form
            contactForm.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        }, 1000);
    });
});

// Google Maps API
function initMap() {
    const location = { lat: 40.7128, lng: -74.0060 }; // New York coordinates
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: location,
        styles: [
            { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
            { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
            {
                featureType: "administrative.locality",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d4af37" }],
            },
            {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d4af37" }],
            },
            {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{ color: "#263c3f" }],
            },
            {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [{ color: "#6b9a76" }],
            },
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [{ color: "#38414e" }],
            },
            {
                featureType: "road",
                elementType: "geometry.stroke",
                stylers: [{ color: "#212a37" }],
            },
            {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [{ color: "#9ca5b3" }],
            },
            {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [{ color: "#746855" }],
            },
            {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [{ color: "#1f2835" }],
            },
            {
                featureType: "road.highway",
                elementType: "labels.text.fill",
                stylers: [{ color: "#f3d19c" }],
            },
            {
                featureType: "transit",
                elementType: "geometry",
                stylers: [{ color: "#2f3948" }],
            },
            {
                featureType: "transit.station",
                elementType: "labels.text.fill",
                stylers: [{ color: "#d4af37" }],
            },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{ color: "#17263c" }],
            },
            {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [{ color: "#515c6d" }],
            },
            {
                featureType: "water",
                elementType: "labels.text.stroke",
                stylers: [{ color: "#17263c" }],
            },
        ],
    });
    
    const marker = new google.maps.Marker({
        position: location,                
        map: map,
        title: "Our Location",
    });
}