<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $jobtitle = htmlspecialchars($_POST['jobtitle']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server (e.g., smtp.gmail.com)
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Replace with your email
        $mail->Password = 'your-email-password'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('chefpaulug@gmail.com', 'Chef Paul Meals UG'); // Sender email and name
        $mail->addAddress('newtonisaacokolimong@gmail.com'); // Recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = "New Contact Form Submission from $firstname $lastname";
        $mail->Body = "
            <h3>New Contact Form Submission</h3>
            <p><strong>First Name:</strong> $firstname</p>
            <p><strong>Last Name:</strong> $lastname</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Service:</strong> $jobtitle</p>
            <p><strong>Message:</strong> $message</p>
        ";

        // Send email
        $mail->send();
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send message. Error: {$mail->ErrorInfo}";
    }
}
?>