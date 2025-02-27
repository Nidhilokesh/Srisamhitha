<?php include 'includes/header.php'; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust path if needed

$alertMessage = ""; // Variable to store JavaScript alert message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP Server Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mstrupthi@gmail.com'; // Your Gmail
        $mail->Password = 'barg jdju doyc fgml'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Sender & Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('mstrupthi@gmail.com'); // Receiver's email

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> $firstName</p>
            <p><strong>Message:</strong> $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong> $message</p>
        ";

        // Send Email
        $mail->send();
        $alertMessage = "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Message Sent!',
                    text: 'Your message has been sent successfully.',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
    } catch (Exception $e) {
        $alertMessage = "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Message Not Sent',
                    text: 'Error: {$mail->ErrorInfo}',
                    confirmButtonText: 'Try Again'
                });
            });
        </script>";
    }
}
?>
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
            
            <!-- <form id="contactForm" class="contact-form">
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
            </form> -->
            <form action="project.php" method="POST" id="contactForm" class="contact-form">
    <div class="form-row">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>
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