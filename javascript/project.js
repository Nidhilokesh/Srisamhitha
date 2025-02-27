

// Enhanced filter buttons functionality
const filterBtns = document.querySelectorAll('.filter-btn');
filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        // Add ripple effect
        const ripple = document.createElement('span');
        ripple.classList.add('ripple');
        btn.appendChild(ripple);
        setTimeout(() => ripple.remove(), 1000);
    });
});

// Enhanced search functionality with debounce
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

const searchBar = document.querySelector('.search-bar');
const projectCards = document.querySelectorAll('.project-card');

const performSearch = debounce((searchTerm) => {
    projectCards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('p').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            card.style.display = 'block';
            card.style.animation = 'scaleIn 0.3s ease-out';
        } else {
            card.style.display = 'none';
        }
    });
}, 300);

searchBar.addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    performSearch(searchTerm);
});

// Enhanced form submission with validation
// const form = document.querySelector('.contact-form');
// form.addEventListener('submit', async (e) => {
//     e.preventDefault();
    
    // Basic form validation
    const inputs = form.querySelectorAll('input, textarea');
    let isValid = true;
    
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
        return;
    }
    
    // Simulate form submission
    const submitBtn = form.querySelector('.submit-btn');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    
    try {
        // Add your actual form submission logic here
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        alert('Thank you for your message! We will get back to you soon.');
        form.reset();
    } catch (error) {
        alert('There was an error sending your message. Please try again.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Send Message';
    }


// Shake animation for invalid inputs
function shake(element) {
    element.style.animation = 'none';
    element.offsetHeight; // Trigger reflow
    element.style.animation = 'shake 0.5s ease-in-out';
}

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    animateOnScroll();
});
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