<?php
// Get current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Function to check if link is active
function isActive($pageName) {
    global $current_page;
    return $current_page === $pageName ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Landing Page</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="javascript/script.js"></script>
</head>
<body>
    <nav class="navbar">
        <a href="../index.php" class="logo">
            <img src="../assets/images/logo1.jpg" alt="Logo">
        </a>
        <button class="hamburger" id="hamburger">&#9776;</button>
        <div class="nav-links" id="nav-links">
            <a href="../index.php" class="<?php echo isActive('index.php'); ?>">Home</a>
            <a href="../project.php" class="<?php echo isActive('project.php'); ?>">Projects</a>
            <!-- <a href="../gallery.php" class="<?php echo isActive('gallery.php'); ?>">Gallery</a> -->
            <a href="../contact.php" class="<?php echo isActive('contact.php'); ?>">Contact Us</a>
        </div>
    </nav>
</body>
</html>
