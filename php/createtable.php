<?php
    include 'nipuna_conn.php';

    mysqli_select_db($conn, 'healthandfitnesshub');

    $createtable="CREATE TABLE user_feedback (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        feedback_type VARCHAR(50) ,
        feedback_text TEXT ,
        first_name VARCHAR(30) ,
        last_name VARCHAR(30) ,
        email VARCHAR(50) 
    )";

    if (mysqli_query($conn, $createtable) === TRUE) {
        echo "Table user_feedback created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

mysqli_close($conn);

?>