<?php
$host = 'localhost';   
$dbname = 'healthandfitnesshub';  
$username = 'root';    
$password = '';
$port = 3306;    

$conn = mysqli_connect($host, $username, $password, $dbname, $port);



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$createTable = "
CREATE TABLE IF NOT EXISTS event_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    comments TEXT,
    event_name VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!mysqli_query($conn, $createTable)) {
    die('Table creation failed: ' . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $comments = $_POST['comments'];
    $event = $_POST['event_select'];

   
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($event)) {
        die("Error: Please fill in all required fields correctly.");
    }

    
  
    $sql = "SELECT id FROM event_registrations WHERE email = '$email' AND event_name = '$event'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        die("You're already registered for this event!");
    }

    
    $sql = "INSERT INTO event_registrations (name, email, phone, comments, event_name) 
            VALUES ('$name', '$email', '$phone', '$comments', '$event')";


    if (mysqli_query($conn, $sql)) {
        
        header("Location: ../pages/thank_you.html");
        exit();
    } else {
        die("Registration failed: " . mysqli_error($conn));
    }
} else {
    header("Location: event_register.html"); 
    exit();
}
?>



