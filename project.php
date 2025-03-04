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
        $mail->setFrom($email, $firstName . ' ' . $lastName);
        $mail->addAddress('mstrupthi@gmail.com'); // Receiver's email

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h2>Contact Form Submission</h2>
            <p><strong>First Name:</strong> $firstName</p>
            <p><strong>Last Name:</strong> $lastName</p>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php echo $alertMessage; // Output alert message if set ?>
    <div class="container">
        <header class="header">
            <h1>Find our Projects</h1>
            <p>Built on desire, Drive on Boldness</p>
        </header>

        <section class="search-section">
            <input type="text" class="search-bar" placeholder="Search for projects...">
            <!-- <div class="filters">
                <button class="filter-btn active">Popular</button>
                <button class="filter-btn">Recent Sales</button>
                <button class="filter-btn">Recent Views</button>
                <button class="filter-btn">Top Rated</button>
                <button class="filter-btn">Featured</button>
            </div> -->
        </section>

        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project-card">
                <img src="../assets/images/sarayu.jpg" alt="Ssarayu-image" class="project-image">
                <div class="project-info">
                    <h3>Sarayu Encalve</h3>
                    <p>Luxury villa with modern amenities</p>
                    <a href="project-details.php?project=parkview">
                        <button class="view-project-btn">View Project Details</button>
                    </a>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card">
                <img src="../assets/images/images.jpg" alt="Brundavan Layout" class="project-image">
                <div class="project-info">
                    <h3>Brundavan Layout</h3>
                    <p>Premium apartments in the heart of the city</p>
                    <!-- <a href="project-details.php?project=beachview"> -->
                        <button class="view-project-btn">Completed</button>
                    </a>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card">
                <img src="../assets/images/1.jpg" alt="Rock view Layout" class="project-image">
                <div class="project-info">
                    <h3>Rock view Layout</h3>
                    <p>Exclusive penthouses with panoramic views</p>
                    <!-- <a href="project-details.php?project=skyline"> -->
                        <button class="view-project-btn">Completed</button>
                    </a>
                </div>
            </div>
        </div>
    
        <!-- Contact Form -->
        <section class="contact-section">
            <h2>Let's Connect</h2>
            <p>Get in touch with us for all your real estate needs. Whether you're looking to buy, sell, or rent properties.</p>
            
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
                <a href="contact.php" class="explore-btn" id="exploreBtn">Contact Us</a>
                <script>
                    document.getElementById("exploreBtn").addEventListener("click", function () {
                    window.location.href = "contact.php";
                });
                </script>
        </section>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="../javascript/project.js"></script>

</body>
</html>