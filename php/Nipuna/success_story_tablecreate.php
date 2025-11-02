<?php
include 'nipuna_conn.php';
echo "</br>";
mysqli_select_db($conn, 'healthandfitnesshub');

    $crete_table="CREATE TABLE IF NOT EXISTS success_stories (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) ,
        story TEXT ,
        telephone VARCHAR(15) 
    )";

    if (mysqli_query($conn, $crete_table)) {
        echo "Table success_stories created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    

mysqli_close($conn);
?>