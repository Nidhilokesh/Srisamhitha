<?php include 'includes/header.php'; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mstrupthi@gmail.com'; // Your Gmail address
        $mail->Password = 'trupthims776'; // Use App Password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587; 

        // Recipients
        $mail->setFrom($email, "$firstName $lastName");
        $mail->addAddress('mstrupthi@gmail.com'); // Change to your recipient email

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission from $firstName $lastName";
        $mail->Body = "
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> $firstName $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        echo "success"; // Response for AJAX
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Contact Us - Sri Samhitha</title>
    <link rel="stylesheet" href="../css/contact.css">
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("contactForm").addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("contact.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.status === "success") {
                    document.getElementById("contactForm").reset();
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
    </script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Main Content -->
    <main>
        <!-- Contact Header -->
        <section class="contact-header">
            <h1>Get in Touch with Sri Samhitha</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
        </section>

        <!-- Contact Features -->
        <section class="contact-features">
            <div class="feature">
                <i class="fas fa-phone"></i>
                <h3>Call Us</h3>
                <p>+1 234 567 890</p>
            </div>
            <div class="feature">
                <i class="fas fa-envelope"></i>
                <h3>Drop Us a Line</h3>
                <p>info@example.com</p>
            </div>
            <div class="feature">
                <i class="fas fa-clock"></i>
                <h3>Working Hours</h3>
                <p>Mon-Sat: 9AM to 6PM</p>
            </div>
            <div class="feature">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Location</h3>
                <p>123 Street, City</p>
            </div>
        </section>

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

        <!-- Map Section -->
        <section class="map-section">
            <h2>Discover Our Office Locations</h2>
            <p>Visit us at our office locations across the city. We're here to serve you better.</p>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1234.5678!2d-123.456789!3d12.345678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDIwJzQ0LjQiTiAxMjPCsDI3JzI0LjQiVw!5e0!3m2!1sen!2sus!4v1234567890" 
                    width="100%" 
                    height="450" 
                    style="border:0; border-radius:10px; max-width: 100%;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <h2>Start Your Real Estate Journey Today</h2>
            <p>Connect with our expert team to explore the best property options that suit your needs.</p>
            <button class="cta-button">Schedule a Call</button>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="../javascript/contact.js"></script>
    <form id="contactForm">
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>