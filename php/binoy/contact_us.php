<?php

include('binoy_conn.php');
include('create_contact_table.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];

  
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
