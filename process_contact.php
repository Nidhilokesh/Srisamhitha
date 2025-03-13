<?php
// Set error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format']);
        exit;
    }
    
    // Set email parameters
    $to = "mstrupthi@gmail.com"; // Your email
    $subject = "New Contact Form Submission from Sri Samhitha Website";
    
    // Create email body
    $email_body = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            h2 { color: #444; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
            td { padding: 10px; border-bottom: 1px solid #eee; }
            .label { font-weight: bold; width: 30%; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>New Contact Form Submission</h2>
            <table>
                <tr>
                    <td class='label'>Name:</td>
                    <td>{$firstName} {$lastName}</td>
                </tr>
                <tr>
                    <td class='label'>Email:</td>
                    <td>{$email}</td>
                </tr>
                <tr>
                    <td class='label'>Phone:</td>
                    <td>{$phone}</td>
                </tr>
                <tr>
                    <td class='label'>Message:</td>
                    <td>{$message}</td>
                </tr>
                <tr>
                    <td class='label'>Date:</td>
                    <td>" . date("Y-m-d H:i:s") . "</td>
                </tr>
                <tr>
                    <td class='label'>IP Address:</td>
                    <td>" . $_SERVER['REMOTE_ADDR'] . "</td>
                </tr>
            </table>
        </div>
    </body>
    </html>
    ";
    
    // Email headers
    $headers = "From: Sri Samhitha Website <noreply@srisamhitha.com>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    // Send email
    $mailSent = mail($to, $subject, $email_body, $headers);
    
    // Send a copy to the user (optional)
    $user_subject = "Thank you for contacting Sri Samhitha";
    $user_message = "
    <html>
    <head>
        <title>Thank you for your message</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            h2 { color: #444; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
            p { margin-bottom: 15px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Thank You for Contacting Sri Samhitha</h2>
            <p>Dear {$firstName},</p>
            <p>We have received your message and will get back to you as soon as possible.</p>
            <p>Here's a copy of the information you submitted:</p>
            <p><strong>Name:</strong> {$firstName} {$lastName}<br>
            <strong>Email:</strong> {$email}<br>
            <strong>Phone:</strong> {$phone}<br>
            <strong>Message:</strong> {$message}</p>
            <p>Best regards,<br>
            The Sri Samhitha Team</p>
        </div>
    </body>
    </html>
    ";
    
    $user_headers = "From: Sri Samhitha <noreply@srisamhitha.com>\r\n";
    $user_headers .= "MIME-Version: 1.0\r\n";
    $user_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $userMailSent = mail($email, $user_subject, $user_message, $user_headers);
    
    // Log the submission (optional)
    $log_message = date("Y-m-d H:i:s") . " - New contact from: " . $firstName . " " . $lastName . " (" . $email . ")\n";
    file_put_contents("contact_log.txt", $log_message, FILE_APPEND);
    
    // Return JSON response
    if ($mailSent) {
        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'There was a problem sending your message. Please try again later.']);
    }
    exit;
}

// If not POST request, redirect to contact page
header("Location: contact.php");
exit;
?>