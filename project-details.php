<?php
// Define project details
$projects = [
    "parkview" => [
        "title" => "Sarayu Enclave",
        "location" => "Srisamhitha, Ballari",
        // "price" => "$500,000",
        "status" => "Available",
        "image" => "../assets/images/sarayu.jpg",
        "description" => "Welcome to Sarayu Enclave, where innovation meets excellence in real estate development.
         We are dedicated to crafting premium residential and commercial spaces that redefine luxury and comfort.
          With a focus on quality, transparency, and customer satisfaction, we aim to provide world-class living environments.",
        "highlights" => ["Underground Electrification", "Many Landscaped Features", "Well Planned Electrical and Plumbing", "24/7 Security"],
        "propertyType" => "Layout",
        "totalArea" => "2,83,000+ sq.ft",
        "yearBuilt" => "2024",
        "totalUnits" => "130+",
        "amenities" => "Gym, Garden, Kids Play Area",
    ],
//     "beachview" => [
//         "title" => "Beachview Layout",
//         "location" => "Seaside Avenue",
//         "price" => "$750,000",
//         "status" => "Under Construction",
//         "image" => "images/beachview.jpg",
//         "description" => "Premium apartments located near the beach, offering stunning views.",
//         "highlights" => ["Sea View", "Private Balcony", "Modern Gym", "High-Speed Elevators"],
//         "propertyType" => "Apartment",
//         "totalArea" => "2,500 sq.ft",
//         "yearBuilt" => "2023",
//         "totalUnits" => "120",
//         "amenities" => "Pool, Gym, Beach Access",
//     ],
//     "skyline" => [
//         "title" => "Rock view Layout",
//         "location" => "Vasavi school backside",
//         // "price" => "$1,200,000",
//         "status" => "Available",
//         "image" => "images/skyline.jpg",
//         "description" => "Exclusive penthouses offering a breathtaking skyline view.",
//         "highlights" => ["Sky Lounge", "Private Elevator", "Luxury Interiors", "Smart Home Features"],
//         "propertyType" => "Penthouse",
//         "totalArea" => "5,500 sq.ft",
//         "yearBuilt" => "2021",
//         "totalUnits" => "30",
//         "amenities" => "Pool, Gym, Concierge, Rooftop Garden",
//     ],
   ];

// Get the project identifier from the URL
$projectKey = "";
if(isset($_GET['project'])) {
    $projectKey = trim($_GET['project']);
}

// Make sure we have a valid project key
if (empty($projectKey) || !array_key_exists($projectKey, $projects)) {
    echo "<div class='error-container'>";
    echo "<h2>Project Not Found</h2>";
    echo "<p>Please return to <a href='projects.php'>projects page</a> and select a valid project.</p>";
    echo "</div>";
    exit;
}

// Get the selected project based on the project key
$project = $projects[$projectKey];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($project['title']); ?> - Project Details</title>
    <link rel="stylesheet" href="../css/project-details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="project-details-container">
        <div class="project-header">
            <h1 id="project-title"><?php echo htmlspecialchars($project['title']); ?></h1>
            <div class="project-meta">
                <span class="location"><i class="fas fa-map-marker-alt"></i> <span id="project-location"><?php echo htmlspecialchars($project['location']); ?></span></span>
                <!-- <span class="price"><i class="fas fa-tag"></i> Starting at <span id="project-price"><?php echo htmlspecialchars($project['price']); ?></span></span> -->
                <span class="status"><i class="fas fa-clock"></i> <span id="project-status"><?php echo htmlspecialchars($project['status']); ?></span></span>
            </div>
        </div>

        <div class="project-gallery">
            <div class="main-image">
                <img id="main-project-image" src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
            </div>
            <div class="thumbnail-gallery">
                <!-- Uncomment and modify when you have actual thumbnail images -->
                <!--
                <img class="thumbnail active" src="<?php echo htmlspecialchars($project['image']); ?>" alt="Main View" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="images/<?php echo $projectKey; ?>-2.jpg" alt="<?php echo htmlspecialchars($project['title']); ?> View 2" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="images/<?php echo $projectKey; ?>-3.jpg" alt="<?php echo htmlspecialchars($project['title']); ?> View 3" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="images/<?php echo $projectKey; ?>-4.jpg" alt="<?php echo htmlspecialchars($project['title']); ?> View 4" onclick="changeMainImage(this.src)">
                -->
            </div>
        </div>

        <div class="project-content">
            <div class="project-description">
                <h2>About This Project</h2>
                <p id="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                
                <div class="project-highlights">
                    <h3>Project Highlights</h3>
                    <ul id="project-highlights-list">
                        <?php foreach ($project['highlights'] as $highlight): ?>
                        <li><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <div class="project-sidebar">
                <div class="key-details">
                    <h3>Key Details</h3>
                    <ul>
                        <li><span>Property Type:</span> <span id="property-type"><?php echo htmlspecialchars($project['propertyType']); ?></span></li>
                        <li><span>Total Area:</span> <span id="total-area"><?php echo htmlspecialchars($project['totalArea']); ?></span></li>
                        <li><span>Year Built:</span> <span id="year-built"><?php echo htmlspecialchars($project['yearBuilt']); ?></span></li>
                        <li><span>Total Units:</span> <span id="total-units"><?php echo htmlspecialchars($project['totalUnits']); ?></span></li>
                        <li><span>Amenities:</span> <span id="amenities"><?php echo htmlspecialchars($project['amenities']); ?></span></li>
                    </ul>
                </div>
                
                <!-- <div class="inquiry-form">
                    <h3>Interested in this Project?</h3>
                    <form id="project-inquiry-form">
                        <input type="hidden" name="project" value="<?php echo htmlspecialchars($projectKey); ?>">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Your Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="I'm interested in this project. Please contact me with more details." rows="3" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Request Details</button>
                    </form>
                </div> -->
            </div>
        </div>
        
        <div class="project-features">
            <h2>Features & Amenities</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-swimming-pool"></i>
                    <h4>Underground Electricity</h4>
                    <p>24/7 Electricity supply</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-dumbbell"></i>
                    <h4>Open Gym</h4>
                    <p>State-of-the-art gym equipment</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-tree"></i>
                    <h4>Landscaped Gardens</h4>
                    <p>Beautiful green spaces to relax</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-car"></i>
                    <h4>Parking</h4>
                    <p>Ample parking space for residents</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>24/7 Security</h4>
                    <p>Round-the-clock security services</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-child"></i>
                    <h4>Children's Play Area</h4>
                    <p>Safe and fun playground for kids</p>
                </div>
            </div>
        </div>
        
        <div class="location-section">
            <!-- <h2>Location</h2>
            <div class="location-content">
                <div class="map-container"> -->
                    <!-- Replace with an actual map integration when possible -->
                    <!-- <img src="/api/placeholder/600/300" alt="Map Location of <?php echo htmlspecialchars($project['title']); ?>" class="location-map"> -->
                    <div class="location-section">
                        <h2>Location</h2>
                        <div class="location-content">
                            <div class="map-container">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.2203414489636!2d76.9459749!3d15.1467586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDA4JzQ4LjMiTiA3NsKwNTYnNDUuNSJF!5e0!3m2!1sen!2sin!4v1700000000000"
                                    width="100%" 
                                    height="450" 
                                    style="border:0; border-radius:10px; max-width: 100%;" 
                                    allowfullscreen 
                                    loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- <div class="nearby-places">
                    <h3>Nearby Places</h3>
                    <ul>
                        <li><i class="fas fa-graduation-cap"></i> Schools: <span>International School (0.5 mi)</span></li>
                        <li><i class="fas fa-shopping-cart"></i> Shopping: <span>City Mall (1.2 mi)</span></li>
                        <li><i class="fas fa-hospital"></i> Hospitals: <span>General Hospital (2.0 mi)</span></li>
                        <li><i class="fas fa-utensils"></i> Restaurants: <span>Multiple within 1 mi</span></li>
                        <li><i class="fas fa-bus"></i> Public Transport: <span>Bus Station (0.3 mi)</span></li>
                    </ul>
                </div> -->
            </div>
        </div>
        
        <!-- <div class="similar-projects">
            <h2>Similar Projects You May Like</h2>
            <div class="similar-projects-grid">
                <?php
                // Get other projects to show as similar projects (excluding current one)
                $similarProjects = [];
                foreach ($projects as $key => $similarProject) {
                    if ($key != $projectKey) {
                        $similarProjects[$key] = $similarProject;
                    }
                }
                
                // Display up to 3 similar projects
                $count = 0;
                foreach ($similarProjects as $key => $similarProject) {
                    if ($count >= 3) break;
                ?>
                <div class="similar-project-card">
                    <img src="<?php echo htmlspecialchars($similarProject['image']); ?>" alt="<?php echo htmlspecialchars($similarProject['title']); ?>">
                    <h4><?php echo htmlspecialchars($similarProject['title']); ?></h4>
                    <p><?php echo htmlspecialchars(substr($similarProject['description'], 0, 50)); ?>...</p>
                    <a href="project-details.php?project=<?php echo urlencode($key); ?>">
                        <button class="view-btn">View Details</button>
                    </a>
                </div>
                <?php
                    $count++;
                }
                ?>
            </div>
        </div> -->
        
        <!-- <div class="cta-section">
            <h2>Ready to Take the Next Step?</h2>
            <p>Schedule a site visit or speak with our property expert</p>
            <div class="cta-buttons">
                <button class="cta-btn primary" id="schedule-visit-btn">Schedule Visit</button>
                <button class="cta-btn secondary" id="call-us-btn">Call Us</button>
            </div>
        </div> -->
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form submission handler
        const inquiryForm = document.getElementById('project-inquiry-form');
        if (inquiryForm) {
            inquiryForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // You can add AJAX form submission here
                alert('Thank you for your interest! Our team will contact you shortly.');
                inquiryForm.reset();
            });
        }
        
        // Main image switcher function
        window.changeMainImage = function(src) {
            const mainImage = document.getElementById('main-project-image');
            if (mainImage) {
                mainImage.src = src;
                
                // Update active thumbnail
                const thumbnails = document.querySelectorAll('.thumbnail');
                thumbnails.forEach(thumb => {
                    if (thumb.src === src) {
                        thumb.classList.add('active');
                    } else {
                        thumb.classList.remove('active');
                    }
                });
            }
        };
        
        // CTA button handlers
        const scheduleVisitBtn = document.getElementById('schedule-visit-btn');
        if (scheduleVisitBtn) {
            scheduleVisitBtn.addEventListener('click', function() {
                // Scroll to the inquiry form or open a modal
                const inquiryForm = document.getElementById('project-inquiry-form');
                if (inquiryForm) {
                    inquiryForm.scrollIntoView({ behavior: 'smooth' });
                    // Focus on the first input
                    const firstInput = inquiryForm.querySelector('input[name="name"]');
                    if (firstInput) setTimeout(() => firstInput.focus(), 500);
                }
            });
        }
        
        const callUsBtn = document.getElementById('call-us-btn');
        if (callUsBtn) {
            callUsBtn.addEventListener('click', function() {
                // You can open a modal with phone numbers or initiate a call
                alert('Call us at: +1-234-567-8900');
            });
        }
    });
    </script>
</body>
</html>