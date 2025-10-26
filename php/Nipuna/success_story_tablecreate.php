<?php
include 'nipuna_conn.php';
mysqli_select_db($conn, 'healthandfitnesshub');
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $crete_table="CREATE TABLE success_stories (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) ,
        story TEXT ,
        telephone VARCHAR(15) 
    )";

    
    if (mysqli_query($conn, $crete_table)) {
        $message = "Table created successfully.";
    } else {
        $message = "Error creating table: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
echo $message;
?>