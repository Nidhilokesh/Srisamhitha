document.addEventListener('DOMContentLoaded', function() {
    // Get URL parameters to load specific project
    const urlParams = new URLSearchParams(window.location.search);
    const projectId = urlParams.get('id');
    
    // If we have a project ID, load that project's data
    if (projectId) {
        fetchProjectData(projectId);
    } else {
        // Default data if no ID is provided
        loadDefaultProjectData();
    }
    
    // Handle form submissions
    const inquiryForm = document.getElementById('project-inquiry-form');
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitInquiryForm(this);
        });
    }
    
    // Initialize animations and interactions
    initializeAnimations();
});

// Function to change the main image when a thumbnail is clicked
function changeMainImage(src) {
    const mainImage = document.getElementById('main-project-image');
    if (mainImage) {
        // Add a fade out/in effect
        mainImage.style.opacity = '0';
        
        setTimeout(() => {
            mainImage.src = src;
            mainImage.style.opacity = '1';
        }, 300);
        
        // Update active thumbnail
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
            if (thumb.getAttribute('src') === src) {
                thumb.classList.add('active');
            }
        });
    }
}

// Function to fetch project data from server
function fetchProjectData(projectId) {
    // This would normally be an AJAX call to your backend
    // For now, we'll simulate with project data
    
    // Simulated project data based on ID
    const projectData = {
        'project1': {
            title: 'Park-view Layout',
            location: 'Central Park District',
            price: '$250,000',
            status: 'Under Construction',
            description: 'Nestled in the heart of the city yet offering a serene escape, Park-view Layout is our signature luxury villa project. Each residence is meticulously designed to blend modern architecture with nature. Featuring spacious interiors, premium finishes, and panoramic views of the central park, these villas represent the pinnacle of urban living. The project includes a variety of amenities designed for comfort, recreation, and community building.',
            highlights: [
                'Private gardens with each villa',
                'Premium architectural finishes',
                'Floor-to-ceiling windows with park views',
                'Smart home technology integration',
                'Energy-efficient design and construction'
            ],
            propertyType: 'Luxury Villas',
            totalArea: '5,200 sq.ft',
            yearBuilt: '2024',
            totalUnits: '28',
            amenities: 'Pool, Gym, Clubhouse, Park Access',
            images: [
                '/images/projects/parkview/main.jpg',
                '/images/projects/parkview/living.jpg',
                '/images/projects/parkview/exterior.jpg',
                '/images/projects/parkview/kitchen.jpg'
            ]
        },
        'project2': {
            title: 'Beachview Layout',
            location: 'Coastal Heights',
            price: '$180,000',
            status: 'Ready to Move',
            description: 'Beachview Layout offers premium apartments with stunning ocean views. Located in the prestigious Coastal Heights neighborhood, this development combines luxury living with the convenience of urban amenities. Each apartment features modern design elements, high-quality finishes, and spacious layouts. The development includes extensive communal areas, beachfront access, and a range of exclusive resident services.',
            highlights: [
                'Direct beach access',
                'Floor-to-ceiling windows with ocean views',
                'Designer kitchens and bathrooms',
                'Private balconies',
                'Concierge service'
            ],
            propertyType: 'Luxury Apartments',
            totalArea: '3,800 sq.ft',
            yearBuilt: '2023',
            totalUnits: '45',
            amenities: 'Beach Access, Infinity Pool, Spa, Fitness Center',
            images: [
                '/images/projects/beachview/main.jpg',
                '/images/projects/beachview/view.jpg',
                '/images/projects/beachview/pool.jpg',
                '/images/projects/beachview/interior.jpg'
            ]
        },
        'project3': {
            title: 'Skyline Penthouses',
            location: 'Downtown District',
            price: '$350,000',
            status: 'Launching Soon',
            description: 'Skyline Penthouses represent the epitome of luxury urban living. Located at the heart of the city\'s skyline, these exclusive penthouse apartments offer unparalleled views and amenities. Each residence features premium materials, custom finishes, and cutting-edge technology. The panoramic views of the city skyline create a living experience unlike any other in the region.',
            highlights: [
                'Panoramic city views',
                'Double-height ceilings',
                'Custom Italian kitchens',
                'Private elevators',
                'Rooftop terraces'
            ],
            propertyType: 'Luxury Penthouses',
            totalArea: '6,500 sq.ft',
            yearBuilt: '2025 (Est.)',
            totalUnits: '12',
            amenities: 'Helipad, Private Pool, 24/7 Concierge, Wine Cellar',
            images: [
                '/images/projects/skyline/main.jpg',
                '/images/projects/skyline/living.jpg',
                '/images/projects/skyline/terrace.jpg',
                '/images/projects/skyline/bedroom.jpg'
            ]
        }
    };
    
    // Check if we have data for the requested project
    if (projectData[projectId]) {
        loadProjectData(projectData[projectId]);
    } else {
        loadDefaultProjectData();
    }
}

// Function to load project data into the page
function loadProjectData(data) {
    // Update page title
    document.title = data.title + ' - Project Details';
    
    // Update header information
    document.getElementById('project-title').textContent = data.title;
    document.getElementById('project-location').textContent = data.location;
    document.getElementById('project-price').textContent = data.price;
    document.getElementById('project-status').textContent = data.status;
    
    // Update description
    document.getElementById('project-description').textContent = data.description;
    
    // Update highlights
    const highlightsList = document.getElementById('project-highlights-list');
    highlightsList.innerHTML = '';
    data.highlights.forEach(highlight => {
        const li = document.createElement('li');
        li.innerHTML = `<i class="fas fa-check-circle"></i> ${highlight}`;
        highlightsList.appendChild(li);
    });
    
    // Update sidebar details
    document.getElementById('property-type').textContent = data.propertyType;
    document.getElementById('total-area').textContent = data.totalArea;
    document.getElementById('year-built').textContent = data.yearBuilt;
    document.getElementById('total-units').textContent = data.totalUnits;
    document.getElementById('amenities').textContent = data.amenities;
    
    // Update images if available
    if (data.images && data.images.length > 0) {
        const mainImage = document.getElementById('main-project-image');
        if (mainImage) {
            mainImage.src = data.images[0];
            mainImage.alt = data.title;
        }
        
        // Update thumbnails
        const thumbnailContainer = document.getElementById('thumbnail-container');
        if (thumbnailContainer) {
            thumbnailContainer.innerHTML = '';
            data.images.forEach((img, index) => {
                const thumbnail = document.createElement('img');
                thumbnail.src = img;
                thumbnail.alt = `${data.title} - Image ${index + 1}`;
                thumbnail.className = 'thumbnail';
                if (index === 0) thumbnail.classList.add('active');
                thumbnail.onclick = function() { changeMainImage(this.src); };
                thumbnailContainer.appendChild(thumbnail);
            });
        }
    }
    
    // Update inquiry form with project name if applicable
    const projectNameInput = document.getElementById('inquiry-project-name');
    if (projectNameInput) {
        projectNameInput.value = data.title;
    }
}

// Function to load default project data if no specific project is requested
function loadDefaultProjectData() {
    // Redirect to projects listing page or show general information
    console.log('No project ID specified or project not found');
    
    // Option 1: Redirect to projects listing
    // window.location.href = 'projects.php';
    
    // Option 2: Load featured project
    fetchProjectData('project1');
    
    // Option 3: Show error message
    const projectContainer = document.querySelector('.project-detail-container');
    if (projectContainer) {
        projectContainer.innerHTML = `
            <div class="error-message">
                <h2>Project Not Found</h2>
                <p>The project you're looking for could not be found. Please browse our available projects.</p>
                <a href="projects.php" class="btn">View All Projects</a>
            </div>
        `;
    }
}

// Function to handle inquiry form submission
function submitInquiryForm(form) {
    // In a real application, this would use AJAX to submit the form data
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    const formStatus = document.getElementById('form-status');
    
    // Disable submit button during processing
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';
    }
    
    // Validate form data
    const name = formData.get('name');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const interest = formData.get('interest');
    
    if (!name || !email || !phone || !interest) {
        showFormMessage('Please fill in all required fields', 'error');
        resetSubmitButton();
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showFormMessage('Please enter a valid email address', 'error');
        resetSubmitButton();
        return;
    }
    
    // Simulate AJAX call with setTimeout
    setTimeout(() => {
        // Simulating successful form submission
        console.log('Form submitted with data:', Object.fromEntries(formData));
        
        // Show success message
        showFormMessage('Thank you for your interest! Our team will contact you shortly.', 'success');
        
        // Reset form
        form.reset();
        resetSubmitButton();
        
        // In a real application, you would use fetch or XMLHttpRequest:
        /*
        fetch('process_inquiry.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showFormMessage(data.message, 'success');
                form.reset();
            } else {
                showFormMessage(data.message || 'An error occurred. Please try again.', 'error');
            }
            resetSubmitButton();
        })
        .catch(error => {
            console.error('Error:', error);
            showFormMessage('An error occurred. Please try again.', 'error');
            resetSubmitButton();
        });
        */
    }, 1500);
    
    // Helper function to reset submit button
    function resetSubmitButton() {
        if (submitButton) {
            submitButton.disabled = false;
            submitButton.textContent = 'Submit Inquiry';
        }
    }
    
    // Helper function to show form messages
    function showFormMessage(message, type) {
        if (formStatus) {
            formStatus.textContent = message;
            formStatus.className = `form-status ${type}`;
            formStatus.style.display = 'block';
            
            // Hide message after 5 seconds
            setTimeout(() => {
                formStatus.style.display = 'none';
            }, 5000);
        } else {
            // Fallback to alert if no status element exists
            alert(message);
        }
    }
}

// Function to initialize animations and interactions
function initializeAnimations() {
    // Animate elements when they come into view
    const animateOnScroll = document.querySelectorAll('.animate-on-scroll');
    
    if (animateOnScroll.length > 0) {
        // Create intersection observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        // Observe each element
        animateOnScroll.forEach(element => {
            observer.observe(element);
        });
    }
    
    // Initialize image gallery lightbox if available
    const galleryImages = document.querySelectorAll('.gallery-image');
    if (galleryImages.length > 0) {
        galleryImages.forEach(image => {
            image.addEventListener('click', function() {
                openLightbox(this.src, this.alt);
            });
        });
    }
}

// Function to open image lightbox
function openLightbox(src, alt) {
    // Create lightbox elements
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    
    const lightboxContent = document.createElement('div');
    lightboxContent.className = 'lightbox-content';
    
    const closeBtn = document.createElement('span');
    closeBtn.className = 'lightbox-close';
    closeBtn.innerHTML = '&times;';
    closeBtn.onclick = closeLightbox;
    
    const image = document.createElement('img');
    image.src = src;
    image.alt = alt;
    
    const caption = document.createElement('div');
    caption.className = 'lightbox-caption';
    caption.textContent = alt;
    
    // Append elements
    lightboxContent.appendChild(closeBtn);
    lightboxContent.appendChild(image);
    lightboxContent.appendChild(caption);
    lightbox.appendChild(lightboxContent);
    document.body.appendChild(lightbox);
    
    // Add click event to close lightbox when clicking outside the image
    lightbox.onclick = function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    };
    
    // Prevent scrolling of the background
    document.body.style.overflow = 'hidden';
    
    // Add animation class after a small delay for transition effect
    setTimeout(() => {
        lightbox.classList.add('active');
    }, 10);
    
    // Function to close lightbox
    function closeLightbox() {
        lightbox.classList.remove('active');
        
        // Remove element after transition
        setTimeout(() => {
            document.body.removeChild(lightbox);
            document.body.style.overflow = '';
        }, 300);
    }
}

// Function to handle CTA button clicks
document.addEventListener('DOMContentLoaded', function() {
    const ctaButtons = document.querySelectorAll('.cta-btn');
    if (ctaButtons.length > 0) {
        ctaButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                if (targetId) {
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    }
});
// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    // Get project data from PHP
    const projectTitle = document.getElementById('project-title');
    const projectLocation = document.getElementById('project-location');
    const projectPrice = document.getElementById('project-price');
    const projectStatus = document.getElementById('project-status');
    const mainProjectImage = document.getElementById('main-project-image');
    const projectDescription = document.getElementById('project-description');
    const projectHighlightsList = document.getElementById('project-highlights-list');
    const propertyType = document.getElementById('property-type');
    const totalArea = document.getElementById('total-area');
    const yearBuilt = document.getElementById('year-built');
    const totalUnits = document.getElementById('total-units');
    const amenities = document.getElementById('amenities');
    
    // Function to populate the project details from PHP
    function populateProjectDetails() {
        // The PHP data is already embedded in the page when it's served
        // This is handled by your PHP code that accesses the $project variable
        
        // If you want to simulate what the PHP would do, you could do this:
        // (but this should be unnecessary if PHP is working correctly)
        const urlParams = new URLSearchParams(window.location.search);
        const projectKey = urlParams.get('project');
        
        console.log("Loading project: " + projectKey);
        
        // This is just for debugging - your PHP should already handle this
        if (!projectKey) {
            console.error("No project parameter in URL");
        }
    }
    
    // Initialize the page
    populateProjectDetails();
    
    // Function to change main image (for thumbnail gallery if you uncomment it)
    window.changeMainImage = function(src) {
        mainProjectImage.src = src;
        // Update active thumbnail
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
            if (thumb.src === src) {
                thumb.classList.add('active');
            }
        });
    };
});