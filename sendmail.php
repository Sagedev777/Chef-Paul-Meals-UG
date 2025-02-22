<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $jobtitle = isset($_POST['jobtitle']) ? htmlspecialchars($_POST['jobtitle']) : 'Not specified';
    $message = htmlspecialchars($_POST['message']);

    $to = "chefpaulug@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission from Chef Paul Meals UG";
    $body = "
    <h2>Contact Form Submission</h2>
    <p><strong>First Name:</strong> $firstname</p>
    <p><strong>Last Name:</strong> $lastname</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Looking For:</strong> $jobtitle</p>
    <p><strong>Message:</strong><br>$message</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send your message. Please try again.'); window.location.href='contact.html';</script>";
    }
}
?>
