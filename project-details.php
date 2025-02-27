<?php
// Define project details
$projects = [
    "parkview" => [
        "title" => "Park-view Layout",
        "location" => "Downtown City",
        "price" => "$500,000",
        "status" => "Available",
        "image" => "images/parkview.jpg",
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
$projectKey = $_GET['project'] ?? null;

// Check if the project exists
if (!isset($projects[$projectKey])) {
    echo "<h2>Project Not Found</h2>";
    exit;
}

$project = $projects[$projectKey];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link rel="stylesheet" href="../css/project-details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    < <div class="project-details-container">
        <div class="project-header">
            <h1 id="project-title"><?php echo $project['title']; ?></h1>
            <div class="project-meta">
                <span class="location"><i class="fas fa-map-marker-alt"></i> <span id="project-location"><?php echo $project['location']; ?></span></span>
                <span class="price"><i class="fas fa-tag"></i> Starting at <span id="project-price"><?php echo $project['price']; ?></span></span>
                <span class="status"><i class="fas fa-clock"></i> <span id="project-status"><?php echo $project['status']; ?></span></span>
            </div>
        </div>

        <div class="project-gallery">
            <div class="main-image">
                <img id="main-project-image" src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
            </div>
            <!-- <div class="thumbnail-gallery">
                <img class="thumbnail active" src="/api/placeholder/150/100" alt="Thumbnail 1" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="/api/placeholder/150/100" alt="Thumbnail 2" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="/api/placeholder/150/100" alt="Thumbnail 3" onclick="changeMainImage(this.src)">
                <img class="thumbnail" src="/api/placeholder/150/100" alt="Thumbnail 4" onclick="changeMainImage(this.src)">
            </div> -->
        </div>

        <div class="project-content">
            <div class="project-description">
                <h2>About This Project</h2>
                <p id="project-description"><?php echo $project['description']; ?></p>
                
                <div class="project-highlights">
                    <h3>Project Highlights</h3>
                    <ul id="project-highlights-list">
                        <?php foreach ($project['highlights'] as $highlight): ?>
                        <li><i class="fas fa-check-circle"></i> <?php echo $highlight; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <div class="project-sidebar">
                <div class="key-details">
                    <h3>Key Details</h3>
                    <ul>
                        <li><span>Property Type:</span> <span id="property-type"><?php echo $project['propertyType']; ?></span></li>
                        <li><span>Total Area:</span> <span id="total-area"><?php echo $project['totalArea']; ?></span></li>
                        <li><span>Year Built:</span> <span id="year-built"><?php echo $project['yearBuilt']; ?></span></li>
                        <li><span>Total Units:</span> <span id="total-units"><?php echo $project['totalUnits']; ?></span></li>
                        <li><span>Amenities:</span> <span id="amenities"><?php echo $project['amenities']; ?></span></li>
                    </ul>
                </div>
                
                <!-- <div class="inquiry-form">
                    <h3>Interested in this Project?</h3>
                    <form id="project-inquiry-form">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Your Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="I'm interested in this project. Please contact me with more details." rows="3" required></textarea>
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
                    <img src="/api/placeholder/600/300" alt="Map" class="location-map">
                </div>
                <div class="nearby-places">
                    <h3>Nearby Places</h3>
                    <ul>
                        <li><i class="fas fa-graduation-cap"></i> Schools: <span>International School (0.5 mi)</span></li>
                        <li><i class="fas fa-shopping-cart"></i> Shopping: <span>City Mall (1.2 mi)</span></li>
                        <li><i class="fas fa-hospital"></i> Hospitals: <span>General Hospital (2.0 mi)</span></li>
                        <li><i class="fas fa-utensils"></i> Restaurants: <span>Multiple within 1 mi</span></li>
                        <li><i class="fas fa-bus"></i> Public Transport: <span>Bus Station (0.3 mi)</span></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="similar-projects">
            <h2>Similar Projects You May Like</h2>
            <div class="similar-projects-grid">
                <div class="similar-project-card">
                    <img src="/api/placeholder/300/200" alt="Similar Project 1">
                    <h4>Mountain View Residences</h4>
                    <p>Luxury apartments with a view</p>
                    <button class="view-btn">View Details</button>
                </div>
                <div class="similar-project-card">
                    <img src="/api/placeholder/300/200" alt="Similar Project 2">
                    <h4>Riverside Villas</h4>
                    <p>Peaceful living by the water</p>
                    <button class="view-btn">View Details</button>
                </div>
                <div class="similar-project-card">
                    <img src="/api/placeholder/300/200" alt="Similar Project 3">
                    <h4>Urban Heights</h4>
                    <p>Modern living in the city center</p>
                    <button class="view-btn">View Details</button>
                </div>
            </div>
        </div>
        
        <div class="cta-section">
            <h2>Ready to Take the Next Step?</h2>
            <p>Schedule a site visit or speak with our property expert</p>
            <div class="cta-buttons">
                <button class="cta-btn primary">Schedule Visit</button>
                <button class="cta-btn secondary">Call Us</button>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    
    <script src="../javascript/project-details.js"></script>
</body>
</html>