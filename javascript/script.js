

// document.addEventListener("DOMContentLoaded", function() {
//     // Enhanced Navigation Toggle
//     const hamburger = document.getElementById("hamburger");
//     const navLinks = document.getElementById("nav-links");

//     hamburger.addEventListener("click", function() {
//         this.classList.toggle("active");
//         navLinks.classList.toggle("show");
//     });


//     // Close mobile menu when clicking outside
//     document.addEventListener("click", function(e) {
//         if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
//             hamburger.classList.remove("active");
//             navLinks.classList.remove("show");
//         }
//     });

//     // Intersection Observer for scroll animations
//     const observerOptions = {
//         threshold: 0.2,
//         rootMargin: "0px"
//     };

//     const observer = new IntersectionObserver((entries) => {
//         entries.forEach(entry => {
//             if (entry.isIntersecting) {
//                 entry.target.style.opacity = "1";
//                 entry.target.style.transform = "translateY(0)";
//                 observer.unobserve(entry.target);
//             }
//         });
//     }, observerOptions);

//     // Observe elements for scroll animations
//     const animatedElements = document.querySelectorAll('.value-card, .achievement-card, .team-member');
//     animatedElements.forEach(el => {
//         el.style.opacity = "0";
//         el.style.transform = "translateY(30px)";
//         observer.observe(el);
//     });

//     // Smooth scroll for anchor links
//     document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//         anchor.addEventListener('click', function(e) {
//             e.preventDefault();
//             const target = document.querySelector(this.getAttribute('href'));
//             if (target) {
//                 target.scrollIntoView({
//                     behavior: 'smooth',
//                     block: 'start'
//                 });
//                 // Close mobile menu after clicking a link
//                 hamburger.classList.remove("active");
//                 navLinks.classList.remove("show");
//             }
//         });
//     });
// });




document.addEventListener("DOMContentLoaded", function() {
    // Enhanced Navigation Toggle
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("nav-links");

    if (hamburger && navLinks) {
        hamburger.addEventListener("click", function() {
            this.classList.toggle("active");
            navLinks.classList.toggle("show");
        });

        // Close mobile menu when clicking outside
        document.addEventListener("click", function(e) {
            if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
                hamburger.classList.remove("active");
                navLinks.classList.remove("show");
            }
        });
    }

    // Hero Section Animation
    const heroTitle = document.querySelector('.hero-title');
    const statCards = document.querySelectorAll('.stat-card');
    
    // Initially set opacity to 0 for manual animation if needed
    if (heroTitle) {
        heroTitle.style.opacity = "1"; // Now using CSS animations
    }
    
    // Parallax effect for hero section
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.pageYOffset;
            hero.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
        });
    }

    // Counter animation for stat numbers
    statCards.forEach(card => {
        const statNumber = card.querySelector('.stat-number');
        const finalValue = parseInt(statNumber.textContent.replace(/\D/g, ''));
        
        if (!isNaN(finalValue)) {
            let suffix = statNumber.textContent.replace(/[0-9]/g, '');
            let startValue = 0;
            let duration = 2000; // 2 seconds
            let increment = finalValue / (duration / 20); // Update every 20ms
            
            statNumber.textContent = "0" + suffix;
            
            let timer = setInterval(() => {
                startValue += increment;
                if (startValue >= finalValue) {
                    clearInterval(timer);
                    startValue = finalValue;
                }
                statNumber.textContent = Math.floor(startValue) + suffix;
            }, 20);
        }
        
        // Add hover effect listener
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.05)';
            this.style.boxShadow = '0 15px 30px rgba(255, 215, 0, 0.3)';
            this.style.background = 'rgba(255, 215, 0, 0.9)';
            
            const statNumber = this.querySelector('.stat-number');
            const statText = this.querySelector('.stat-text');
            
            if (statNumber) statNumber.style.color = '#000';
            if (statText) statText.style.color = '#000';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
            this.style.background = '';
            
            const statNumber = this.querySelector('.stat-number');
            const statText = this.querySelector('.stat-text');
            
            if (statNumber) statNumber.style.color = '';
            if (statText) statText.style.color = '';
        });
    });

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.2,
        rootMargin: "0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe other elements for scroll animations
    const animatedElements = document.querySelectorAll('.value-card, .achievement-card, .team-member');
    animatedElements.forEach(el => {
        el.style.opacity = "0";
        el.style.transform = "translateY(30px)";
        observer.observe(el);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Close mobile menu after clicking a link
                if (hamburger && navLinks) {
                    hamburger.classList.remove("active");
                    navLinks.classList.remove("show");
                }
            }
        });
    });
});


// Toggle effect for value and achievement cards
document.querySelectorAll('.value-card, .achievement-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-5px)';
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
    });
});

// Enhanced toggle effect with shadow for value and achievement cards
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll('.value-card, .achievement-card');

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0px 10px 15px rgba(255, 215, 0, 0.3)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });
});

// Toggle effect for image items
document.addEventListener("DOMContentLoaded", function () {
    const imageItems = document.querySelectorAll(".image-item img");

    // Hover effect for desktops
    imageItems.forEach((img) => {
        img.addEventListener("mouseenter", () => {
            img.style.transform = "scale(1.05)";
        });

        img.addEventListener("mouseleave", () => {
            img.style.transform = "scale(1)";
        });
    });

    // Click effect for mobile users
    imageItems.forEach((img) => {
        img.addEventListener("click", () => {
            img.style.transform = "scale(1.05)";
            setTimeout(() => img.style.transform = "scale(1)", 300);
        });
    });
});

    // Toggle effect for team members
    document.addEventListener("DOMContentLoaded", function () {
        const teamMembers = document.querySelectorAll(".team-member");

        // Hover effect for desktop
        teamMembers.forEach(member => {
            member.addEventListener("mouseenter", () => {
                member.style.transform = "translateY(-5px)";
            });

            member.addEventListener("mouseleave", () => {
                member.style.transform = "translateY(0)";
            });
        });

        // Tap effect for mobile users
        teamMembers.forEach(member => {
            member.addEventListener("touchstart", () => {
                member.style.transform = "translateY(-5px)";
            });

            member.addEventListener("touchend", () => {
                setTimeout(() => {
                    member.style.transform = "translateY(0)";
                }, 300);
            });
        });
    });




