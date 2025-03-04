<?php
// Function to check if link is active (matching the header functionality)
function isFooterActive($pageName) {
    global $current_page;
    return isset($current_page) && $current_page === $pageName ? 'active' : '';
}

// Get the current page dynamically
$current_page = basename($_SERVER['PHP_SELF']);

function renderFooter() {
    global $current_page;
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Landing Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="../assets/images/logo2.jpg" alt="Sri Samhitha Enterprises Logo">
                <h3 class="company-name">SRI SAMHITHA</h3>
                <p class="company-subtext">ENTERPRISES</p>
            </div>

            <div class="footer-section">
                <h3>Information</h3>
                <ul class="footer-links">
                <li><a href="../index.php" class="<?php echo isActive('index.php'); ?>">Home</a></li>
                <li><a href="../index.php#about">About Us</a></li>
                <li><a href="../project.php" class="<?php echo isActive('project.php'); ?>">Projects</a></li>
                <li><a href="../contact.php" class="<?php echo isActive('contact.php'); ?>">Contact Us</a></li>
                </ul>
            </div>

                        <!-- Add FontAwesome CDN in your HTML <head> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

            <div class="footer-section">
                <h3>Contacts</h3>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i> 
                    <a href="https://www.google.com/maps/place/15%C2%B008'48.3%22N+76%C2%B056'45.5%22E/@15.1467586,76.9434,17z/data=!3m1!4b1!4m4!3m3!8m2!3d15.1467586!4d76.9459749" 
                        target="_blank" 
                        rel="noopener noreferrer">
                        Sri Samhitha, Patel Nagar, Ballari
                    </a>
                </div>

                <div class="contact-info">
                    <i class="fas fa-phone-alt"></i> 
                    <a href="tel:+919353077899" style="text-decoration: none; color: inherit;">
                        +91 93530 77899
                    </a>
                </div>

                <div class="contact-info">
                    <i class="fas fa-envelope"></i> <a href="mailto:srisamhithaenterprises1234@gmail.com">srisamhithaenterprises1234@gmail.com</a>
                </div>
            </div>


            <div class="footer-section">
                <h3>Social Media</h3>
                <div class="social-media">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <!-- <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a> -->
                </div>
            </div>
        </div>
        <div class="copyright">
            © <?php echo date('Y'); ?> All Rights Reserved
        </div>
    </footer>    
<?php
}

// Call the function to render the footer
renderFooter();
?>

