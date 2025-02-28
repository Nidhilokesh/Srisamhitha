<?php
// Define project details
$projects = [
    "parkview" => [
        "title" => "Sarayu Encalve",
        "location" => "Downtown City",
        "price" => "$500,000",
        "status" => "Available",
        "image" => "../assets/images/sarayu.jpg",
        "description" => "A luxury villa offering modern amenities and spacious living.",
        "highlights" => ["Spacious Living Area", "Private Pool", "Modern Interiors", "24/7 Security"],
        "propertyType" => "Villa",
        "totalArea" => "4,000 sq.ft",
        "yearBuilt" => "2022",
        "totalUnits" => "50",
        "amenities" => "Pool, Gym, Garden",
    ],
    "beachview" => [
        "title" => "Beachview Layout",
        "location" => "Seaside Avenue",
        "price" => "$750,000",
        "status" => "Under Construction",
        "image" => "images/beachview.jpg",
        "description" => "Premium apartments located near the beach, offering stunning views.",
        "highlights" => ["Sea View", "Private Balcony", "Modern Gym", "High-Speed Elevators"],
        "propertyType" => "Apartment",
        "totalArea" => "2,500 sq.ft",
        "yearBuilt" => "2023",
        "totalUnits" => "120",
        "amenities" => "Pool, Gym, Beach Access",
    ],
    "skyline" => [
        "title" => "Skyline Penthouses",
        "location" => "City Center",
        "price" => "$1,200,000",
        "status" => "Available",
        "image" => "images/skyline.jpg",
        "description" => "Exclusive penthouses offering a breathtaking skyline view.",
        "highlights" => ["Sky Lounge", "Private Elevator", "Luxury Interiors", "Smart Home Features"],
        "propertyType" => "Penthouse",
        "totalArea" => "5,500 sq.ft",
        "yearBuilt" => "2021",
        "totalUnits" => "30",
        "amenities" => "Pool, Gym, Concierge, Rooftop Garden",
    ],
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
    <!-- Add fallback inline styles in case the CSS file isn't loading -->
    <!-- <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }
        
        .error-container {
            max-width: 800px;
            margin: 100px auto;
            padding: 30px;
            text-align: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .project-details-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Mobile first design - start with styles for small screens */
        .project-header {
            margin-bottom: 20px;
        }
        
        .project-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .project-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 14px;
        }
        
        .project-meta span {
            margin-right: 15px;
        }
        
        .project-meta i {
            margin-right: 5px;
            color: #3498db;
        }
        
        .project-gallery {
            margin-bottom: 30px;
        }
        
        .main-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .thumbnail-gallery {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        
        .thumbnail {
            width: 80px;
            height: 60px;
            border-radius: 4px;
            cursor: pointer;
            object-fit: cover;
        }
        
        .thumbnail.active {
            border: 2px solid #3498db;
        }
        
        .project-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .project-description {
            width: 100%;
        }
        
        .project-description h2, 
        .project-highlights h3,
        .key-details h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }
        
        .project-highlights ul {
            list-style: none;
        }
        
        .project-highlights li {
            margin-bottom: 10px;
        }
        
        .project-highlights i {
            color: #27ae60;
            margin-right: 10px;
        }
        
        /* .project-sidebar {
            width: 100%;
            background: #fff;
            border-radius: 5px;
            padding: 1px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        
        } */
      /* Sidebar */
        .project-sidebar {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .key-details {
            background-color: var(--light-gray);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: var(--box-shadow);
        }

        .key-details h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        .key-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .key-details li {
            margin-bottom: 0.8rem;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px dashed var(--medium-gray);
            padding-bottom: 0.5rem;
        }

        .key-details li:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        
        .project-features {
            margin-bottom: 40px;
        }
        
        .project-features h2 {
            margin-bottom: 100px;
            color: #2c3e50;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .feature-item {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .feature-item i {
            font-size: 30px;
            color: #3498db;
            margin-bottom: 10px;
        }
        
        .feature-item h4 {
            margin-bottom: 5px;
            color: #2c3e50;
        }
        
        .location-section {
            margin-bottom: 40px;
        }
        
        .location-section h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        
        .location-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .map-container {
            width: 100%;
            height: 250px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .location-map {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .nearby-places h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }
        
        .nearby-places ul {
            list-style: none;
        }
        
        .nearby-places li {
            margin-bottom: 10px;
        }
        
        .nearby-places i {
            margin-right: 10px;
            color: #3498db;
        }
        
        .similar-projects {
            margin-bottom: 40px;
        }
        
        .similar-projects h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        
        .similar-projects-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .similar-project-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .similar-project-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        
        .similar-project-card h4 {
            padding: 15px 15px 5px;
            color: #2c3e50;
        }
        
        .similar-project-card p {
            padding: 0 15px 15px;
            font-size: 14px;
            color: #666;
        }
        
        .view-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: #fff;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .view-btn:hover {
            background: #2980b9;
        }
        
        .cta-section {
            background: #2c3e50;
            color: #fff;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .cta-section h2 {
            margin-bottom: 10px;
        }
        
        .cta-section p {
            margin-bottom: 20px;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .cta-btn.primary {
            background: #e74c3c;
            color: #fff;
        }
        
        .cta-btn.primary:hover {
            background: #c0392b;
        }
        
        .cta-btn.secondary {
            background: transparent;
            color: #fff;
            border: 2px solid #fff;
        }
        
        .cta-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        /* Media queries for larger screens */
        @media (min-width: 768px) {
            .project-header h1 {
                font-size: 32px;
            }
            
            .project-meta {
                flex-direction: row;
                font-size: 16px;
            }
            
            .main-image {
                height: 400px;
            }
            
            .project-content {
                flex-direction: row;
            }
            
            .project-description {
                width: 65%;
            }
            
            .project-sidebar {
                width: 35%;
            }
            
            .features-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .location-content {
                flex-direction: row;
            }
            
            .map-container {
                width: 60%;
                height: 300px;
            }
            
            .nearby-places {
                width: 40%;
            }
            
            .similar-projects-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (min-width: 992px) {
            .main-image {
                height: 500px;
            }
            
            .features-grid {
                grid-template-columns: repeat(6, 1fr);
            }
        }
        
        @media (max-width: 320px) {
            .project-meta span {
                font-size: 12px;
            }
            
            .main-image {
                height: 200px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-buttons {
                flex-direction: column;
            }
        }
    </style> -->
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
                <span class="price"><i class="fas fa-tag"></i> Starting at <span id="project-price"><?php echo htmlspecialchars($project['price']); ?></span></span>
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
                    <h4>Swimming Pool</h4>
                    <p>Luxurious pool with lounging areas</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-dumbbell"></i>
                    <h4>Fitness Center</h4>
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
            <h2>Location</h2>
            <div class="location-content">
                <div class="map-container">
                    <!-- Replace with an actual map integration when possible -->
                    <img src="/api/placeholder/600/300" alt="Map Location of <?php echo htmlspecialchars($project['title']); ?>" class="location-map">
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