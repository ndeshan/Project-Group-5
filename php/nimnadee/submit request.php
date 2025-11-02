<?php

$conn = mysqli_connect("localhost", "root", "", "HealthandFitnessHub");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$createDB = "CREATE DATABASE IF NOT EXISTS HealthandFitnessHub";
if (!mysqli_query($conn, $createDB)) {
    echo "Error creating database: " . mysqli_error($conn);
}


mysqli_select_db($conn, "HealthandFitnessHub");


$createTable = "CREATE TABLE IF NOT EXISTS personal_trainning (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    package VARCHAR(50),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($conn, $createTable)) {
    echo "Error creating table: " . mysqli_error($conn);
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$package = $_POST['package'];
$message = $_POST['message'];


$sql = "INSERT INTO personal_trainning (name, email, phone, package, message) 
        VALUES ('$name', '$email', '$phone', '$package', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Thank you! We will contact you within 24 hours.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>