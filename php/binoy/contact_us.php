<?php
include('binoy_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect inputs
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $number = trim($_POST['number'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    // Validation
    if (empty($name) || empty($email) || empty($number) || empty($comment)) {
        echo "All fields are required.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    if (!preg_match("/^\+?[0-9]{7,15}$/", $number)) {
        echo "Invalid phone number.";
        exit();
    }

    if (strlen($comment) < 5) {
        echo "Comment must be at least 5 characters long.";
        exit();
    }

    // Escape special characters before inserting
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $number = $conn->real_escape_string($number);
    $comment = $conn->real_escape_string($comment);

    // Insert data
    $sql = "INSERT INTO contact_us (name, email, phone, comment) 
            VALUES ('$name', '$email', '$number', '$comment')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

