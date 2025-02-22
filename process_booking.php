<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);

    // Validate inputs
    if (empty($fullname) || empty($email) || empty($phone) || empty($date) || empty($time)) {
        die("Please fill out all required fields.");
    }

    // Email configuration
    $to = "your_gmail@example.com"; // Replace with your Gmail address
    $subject = "New Booking Request from $fullname";
    $body = "You have received a new booking request:\n\n";
    $body .= "Name: $fullname\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Date: $date\n";
    $body .= "Time: $time\n\n";
    $body .= "Special Requests:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $fullname. Your booking has been submitted successfully.";
    } else {
        echo "Sorry, there was an error processing your booking. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
