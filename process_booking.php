<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $eventype = htmlspecialchars($_POST['eventype']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $area = htmlspecialchars($_POST['area']);
    $city = htmlspecialchars($_POST['city']);
    $post_code = htmlspecialchars($_POST['post-code']);
    $country = htmlspecialchars($_POST['country']);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chef_paul-_meals_ug";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO bookings (name, phone, eventype, email, date, time, area, city, post_code, country)
            VALUES ('$name', '$phone', '$eventype', '$email', '$date', '$time', '$area', '$city', '$post_code', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>