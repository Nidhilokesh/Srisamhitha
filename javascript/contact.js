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
        alert('Please fill in all fields.');
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }

    // Phone validation (allows digits, spaces, dashes, and optional + at the start)
    const phoneRegex = /^\+?[\d\s-]{10,}$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid phone number.');
        return;
    }

    // If validation passes, log form data (or send to server)
    console.log('Form submitted:', {
        firstName,
        lastName,
        email,
        phone,
        message
    });

    // Show success message
    alert('Thank you for your message! We will get back to you soon.');

    // Optionally, reset the form
    document.getElementById('contactForm').reset();
});
