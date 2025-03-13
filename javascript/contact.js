document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');

    // Smooth animations for elements appearing on scroll
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

    // Adjust scrolling behavior for mobile devices
    window.addEventListener('resize', function () {
        if (window.innerWidth < 480) {
            document.body.style.zoom = '100%'; // Prevents zooming issues on mobile
        }
    });

    // Form submission handling
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent actual form submission
            let isValid = true;
            const inputs = form.querySelectorAll('input, textarea');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = '#ff4444';
                    shake(input);
                } else {
                    input.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                }
            });
            
            if (!isValid) {
                Swal.fire({
                    title: 'Error',
                    text: 'Please fill in all required fields',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#dc3545'
                });
            } else {
                // Show loading state
                const submitBtn = form.querySelector('.submit-btn');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending...';
                
                // Send form data via AJAX
                const formData = new FormData(form);
                
                fetch('process_contact.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send Message';
                    
                    if (data.status === 'success') {
                        // Reset the form
                        form.reset();
                        
                        // Show success message
                        Swal.fire({
                            title: 'Message Sent!',
                            text: 'Thank you for contacting us. We will get back to you soon.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#28a745'
                        });
                    } else {
                        // Show error message
                        Swal.fire({
                            title: 'Error',
                            text: data.message || 'There was a problem sending your message. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send Message';
                    
                    Swal.fire({
                        title: 'Error',
                        text: 'There was a problem sending your message. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#dc3545'
                    });
                });
            }
        });
    }

    // Function to shake invalid inputs
    function shake(element) {
        element.style.animation = 'none';
        element.offsetHeight; // Trigger reflow
        element.style.animation = 'shake 0.5s ease-in-out';
    }

    // Basic form validation on inputs
    const inputs = document.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', () => {
            if (input.required && !input.value.trim()) {
                input.style.borderColor = '#ff4444';
                shake(input);
            } else {
                input.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            }
        });
        
        // Clear error styling on input
        input.addEventListener('input', () => {
            if (input.value.trim()) {
                input.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            }
        });
    });
});