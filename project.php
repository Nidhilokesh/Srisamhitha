<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Projects</title>
    <link rel="stylesheet" href="../css/project.css">
    <!-- <link rel="stylesheet" href="../css/contact.css"> -->
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Find our Projects</h1>
            <p>Built on desire, Drive on Boldness</p>
        </header>

        <section class="search-section">
            <input type="text" class="search-bar" placeholder="Search for projects...">
            <div class="filters">
                <button class="filter-btn active">Popular</button>
                <button class="filter-btn">Recent Sales</button>
                <button class="filter-btn">Recent Views</button>
                <button class="filter-btn">Top Rated</button>
                <button class="filter-btn">Featured</button>
            </div>
        </section>

        <div class="projects-grid">
            <div class="project-card">
                <img src="/api/placeholder/400/320" alt="Modern Villa" class="project-image">
                <div class="project-info">
                    <h3>Park-view Layout</h3>
                    <p>Luxury villa with modern amenities</p>
                    <button class="view-project-btn">View Project Details</button>
                </div>
            </div>

            <div class="project-card">
                <img src="/api/placeholder/400/320" alt="Downtown Towers" class="project-image">
                <div class="project-info">
                    <h3>Beachview Layout</h3>
                    <p>Premium apartments in the heart of the city</p>
                    <button class="view-project-btn">View Project Details</button>
                </div>
            </div>

            <div class="project-card">
                <img src="/api/placeholder/400/320" alt="Skyline Penthouses" class="project-image">
                <div class="project-info">
                    <h3>Skyline Penthouses</h3>
                    <p>Exclusive penthouses with panoramic views</p>
                    <button class="view-project-btn">View Project Details</button>
                </div>
            </div>
        </div>
    
    

        <!-- Contact Form -->
        <section class="contact-section">
            <h2>Let's Connect</h2>
            <p>Get in touch with us for all your real estate needs. Whether you're looking to buy, sell, or rent properties.</p>
            
            <form id="contactForm" class="contact-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" rows="5" required></textarea>
                </div>
                <div class="form-group"> 
                    <button type="submit" class="submit-btn">Send Message</button>
                </div>
            </form>
        </section>

        <section class="cta-section">
            <h2>Start Your Real Estate Journey Today</h2>
            <p>Let us help you find your dream property</p>
            <button class="cta-btn">Contact Us Now</button>
        </section>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="../javascript/project.js"></script>

</body>
</html>