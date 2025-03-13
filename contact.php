<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Contact Us - Sri Samhitha</title>
    <link rel="stylesheet" href="../css/contact.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!-- Main Content -->
    <main>
        <!-- Contact Header -->
        <section class="contact-header">
            <h1>Get in Touch with Sri Samhitha</h1>
            <p>Have Questions? We're Here to Help! Reach out to us for expert guidance, personalized support, and seamless solutions to meet your needs.</p>
        </section>

        <!-- Contact Features -->
        <section class="contact-features">
            <div class="feature">
                <i class="fas fa-phone"></i>
                <h3>Call Us</h3>
                <p><a href="tel:+91 93530 77899" style="text-decoration: none; color: inherit;">+91 93530 77899</a></p>
            </div>

            <div class="feature">
                <i class="fas fa-envelope"></i>
                <h3>Drop Us a Line</h3>
                <p>
                    <a href="mailto:srisamhithaenterprises1234@gmail.com">srisamhithaenterprises1234@gmail.com</a>
                </p>
            </div>

            <div class="feature">
                <i class="fas fa-clock"></i>
                <h3>Working Hours</h3>
                <p>Mon-Fri: 10AM to 5PM</p>
            </div>
            <div class="feature">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Location</h3>
                <p>
                    <a href="https://www.google.com/maps/place/15%C2%B008'48.3%22N+76%C2%B056'45.5%22E/@15.1467586,76.9434,17z/data=!3m1!4b1!4m4!3m3!8m2!3d15.1467586!4d76.9459749" 
                    target="_blank" 
                    style="text-decoration: none; color: inherit;">
                        Patel Nagar, Ballari
                    </a>
                </p>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="contact-section">
            <h2>Let's Connect</h2>
            <p>Get in touch with us for all your real estate needs. Whether you're looking to buy, sell, or rent properties.</p>
            
            <form action="process_contact.php" method="POST" id="contactForm" class="contact-form">
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

        <!-- Map Section -->
        <section class="map-section">
            <h2>Discover Our Office Location</h2>
            <p>Visit us at our office locations across the city. We're here to serve you better.</p>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.2203414489636!2d76.9459749!3d15.1467586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDA4JzQ4LjMiTiA3NsKwNTYnNDUuNSJF!5e0!3m2!1sen!2sin!4v1700000000000" 
                    width="100%" 
                    height="450" 
                    style="border:0; border-radius:10px; max-width: 100%;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../javascript/contact.js"></script>
</body>
</html>