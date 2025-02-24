// // Filter buttons functionality
// const filterBtns = document.querySelectorAll('.filter-btn');
// filterBtns.forEach(btn => {
//     btn.addEventListener('click', () => {
//         filterBtns.forEach(b => b.classList.remove('active'));
//         btn.classList.add('active');
//     });
// });

// // Search functionality
// const searchBar = document.querySelector('.search-bar');
// const projectCards = document.querySelectorAll('.project-card');

// searchBar.addEventListener('input', (e) => {
//     const searchTerm = e.target.value.toLowerCase();
//     projectCards.forEach(card => {
//         const title = card.querySelector('h3').textContent.toLowerCase();
//         const description = card.querySelector('p').textContent.toLowerCase();
        
//         if (title.includes(searchTerm) || description.includes(searchTerm)) {
//             card.style.display = 'block';
//         } else {
//             card.style.display = 'none';
//         }
//     });
// });

// // Form submission
// const form = document.querySelector('.connect-form');
// form.addEventListener('submit', (e) => {
//     e.preventDefault();
//     // Add your form submission logic here
//     alert('Thank you for your message! We will get back to you soon.');
//     form.reset();
// });
// // Animate project cards on scroll
// function animateOnScroll() {
//     const cards = document.querySelectorAll('.project-card');
//     const observer = new IntersectionObserver((entries) => {
//         entries.forEach(entry => {
//             if (entry.isIntersecting) {
//                 entry.target.style.opacity = '1';
//                 entry.target.style.transform = 'translateY(0)';
//             }
//         });
//     }, { threshold: 0.1 });

//     cards.forEach(card => {
//         card.style.opacity = '0';
//         card.style.transform = 'translateY(20px)';
//         observer.observe(card);
//     });
// }

// // Smooth scroll functionality
// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault();
//         document.querySelector(this.getAttribute('href')).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });

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
const form = document.querySelector('.contact-form');
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
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
});

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