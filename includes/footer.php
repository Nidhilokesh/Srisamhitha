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
                <h2 class="company-name">SRI SAMHITHA</h2>
                <p class="company-subtext">ENTERPRISES</p>
            </div>

            <div class="footer-section">
                <h3>Information</h3>
                <ul class="footer-links">
                <li><a href="../index.php" class="<?php echo isActive('index.php'); ?>">Home</a></li>
                <li><a href="../index.php#about">About Us</a></li>
                <li><a href="../project.php" class="<?php echo isActive('project.php'); ?>">Projects</a></li>
                <li><a href="../gallery.php" class="<?php echo isActive('gallery.php'); ?>">Gallery</a></li>
                <li><a href="../contact.php" class="<?php echo isActive('contact.php'); ?>">Contact Us</a></li>
                </ul>
            </div>

                        <!-- Add FontAwesome CDN in your HTML <head> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

            <div class="footer-section">
                <h3>Contacts</h3>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i> 1234 Sample Street, Austin TX 78681
                </div>
                <div class="contact-info">
                    <i class="fas fa-phone-alt"></i> 512.333.2222
                </div>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i> <a href="mailto:sampleemail@gmail.com">sampleemail@gmail.com</a>
                </div>
            </div>


            <div class="footer-section">
                <h3>Social Media</h3>
                <div class="social-media">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
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

