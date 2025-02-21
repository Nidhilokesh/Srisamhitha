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
                    <li><a href="../index.php" class="<?php echo isFooterActive('index.php'); ?>">Home</a></li>
                    <li><a href="../pages/about.php" class="<?php echo isFooterActive('about.php'); ?>">About Us</a></li>
                    <li><a href="../pages/projects.php" class="<?php echo isFooterActive('projects.php'); ?>">Projects</a></li>
                    <li><a href="../pages/gallery.php" class="<?php echo isFooterActive('gallery.php'); ?>">Gallery</a></li>
                    <li><a href="../pages/contact.php" class="<?php echo isFooterActive('contact.php'); ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contacts</h3>
                <div class="contact-info">
                    <span>📍 1234 Sample Street, Austin TX 78681</span>
                </div>
                <div class="contact-info">
                    <span>📧 <a href="mailto:sampleemail@gmail.com">sampleemail@gmail.com</a></span>
                </div>
                <div class="contact-info">
                    <span>📞 512.333.2222</span>
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
