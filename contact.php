<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Company Name</title>
    <style>
        :root {
            --dark-bg: #121212;
            --dark-secondary: #1e1e2d;
            --gold-primary: #d4af37;
            --gold-secondary: #ffd700;
            --text-light: #ffffff;
            --text-muted: #cccccc;
            --accent-blue: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-light);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            width: 60px;
            height: 60px;
        }

        .logo-text {
            font-size: 32px;
            font-weight: bold;
            margin-left: 15px;
            color: var(--text-light);
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .nav-links {
            display: flex;
        }

        .nav-link {
            color: var(--text-light);
            text-decoration: none;
            margin-right: 30px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--gold-primary);
        }

        .cta-button {
            background-color: var(--accent-blue);
            color: var(--text-light);
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #2980b9;
        }

        .page-title {
            text-align: center;
            margin: 40px 0;
            font-size: 36px;
            color: var(--gold-primary);
        }

        .page-subtitle {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 40px;
            color: var(--text-muted);
        }

        .accent-underline {
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--gold-primary);
            margin: 10px auto 30px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 40px;
        }

        .contact-form-container {
            background-color: var(--dark-secondary);
            border-radius: 8px;
            padding: 30px;
        }

        .section-icon {
            color: var(--gold-primary);
            font-size: 24px;
            margin-right: 10px;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            color: var(--text-light);
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold-primary);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-reset {
            background-color: transparent;
            border: 1px solid var(--text-muted);
            color: var(--text-muted);
            flex: 1;
        }

        .btn-reset:hover {
            border-color: var(--text-light);
            color: var(--text-light);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-secondary));
            color: #000;
            flex: 2;
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .contact-info-container {
            background-color: var(--dark-secondary);
            border-radius: 8px;
            padding: 30px;
        }

        .info-item {
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
        }

        .info-icon {
            color: var(--gold-primary);
            font-size: 20px;
            margin-right: 15px;
            min-width: 24px;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-weight: bold;
            color: var(--gold-primary);
            margin-bottom: 5px;
        }

        .info-text {
            color: var(--text-muted);
        }

        .map-container {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            height: 250px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .map-view-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: var(--gold-primary);
            text-decoration: none;
        }

        .map-view-link:hover {
            text-decoration: underline;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .navigation {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                margin-top: 15px;
                flex-wrap: wrap;
            }

            .nav-link {
                margin-bottom: 10px;
            }

            .cta-button {
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Section -->
        <div class="logo-container">
            <div class="logo">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <rect x="10" y="30" width="30" height="60" fill="#d4af37" />
                    <rect x="40" y="10" width="30" height="80" fill="#d4af37" />
                    <rect x="70" y="40" width="30" height="50" fill="#d4af37" />
                </svg>
            </div>
            <div class="logo-text">CompanyName</div>
        </div>

        <!-- Navigation -->
        <div class="navigation">
            <div class="nav-links">
                <a href="#" class="nav-link">Home</a>
                <a href="#" class="nav-link">About Us</a>
                <a href="#" class="nav-link">Contact</a>
            </div>
            <a href="#" class="cta-button">Contact Us Now</a>
        </div>

        <!-- Page Title -->
        <h1 class="page-title">Get In Touch</h1>
        <p class="page-subtitle">We're here to help you optimize your business. Reach out to us for personalized solutions that drive success.</p>
        <span class="accent-underline"></span>

        <!-- Contact Grid -->
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-container">
                <h2 class="section-title">
                    <span class="section-icon">✉️</span>
                    Send Us a Message
                </h2>
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone Number">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="button-group">
                        <button type="reset" class="btn btn-reset">Reset</button>
                        <button type="submit" class="btn btn-submit">Send Message</button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info-container">
                <h2 class="section-title">
                    <span class="section-icon">📍</span>
                    Our Location
                </h2>
                <div class="info-item">
                    <div class="info-icon">🏢</div>
                    <div class="info-content">
                        <div class="info-text">#01, 2nd Floor, NIE Startup and Incubation Center,</div>
                        <div class="info-text">NIE College South Campus, Mananthavadi Road,</div>
                        <div class="info-text">Mysuru 570008</div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-content">
                        <div class="info-text">+91 99803 36484</div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📧</div>
                    <div class="info-content">
                        <div class="info-text">office@companyname.com</div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">🕒</div>
                    <div class="info-content">
                        <div class="info-text">Monday - Friday, 10:00 AM - 5:00 PM</div>
                    </div>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.7!2m3!1f0!2m1!1f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDU4JzIyLjgiTiA3NsKwMzgnMjEuOSJF!5e0!3m2!1sen!2sin!4v1615465562345!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <a href="#" class="map-view-link">View larger map</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const message = document.getElementById('message').value;
                
                // Here you would normally send the data to a server
                // For demonstration, we'll just show an alert
                
                alert(`Form submitted!\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nMessage: ${message}`);
                
                // In real implementation, you would use AJAX or fetch to send the data to PHP backend
                // Example of PHP processing would be provided separately
                
                contactForm.reset();
            });
        });
    </script>
</body>
</html>