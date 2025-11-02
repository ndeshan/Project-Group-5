<?php
include 'nipuna_conn.php';

echo "<br>";
mysqli_select_db($conn, 'healthandfitnesshub');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST["name"];
    $story = $_POST["story"];
    $telephone = $_POST["telephone"];

    if(empty($name) || empty($story) || empty($telephone)) {
        echo "All fields are required.";
    } else {
        if (!preg_match("/^[0-9]{10}$/", $telephone)) {
            echo "Invalid telephone number format.";
        }
    }

    $datainsert= "INSERT INTO success_stories (name, story, telephone) VALUES ('$name', '$story', '$telephone')";

    if (mysqli_query($conn, $datainsert) === TRUE) {
        echo "Success story submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}   
mysqli_close($conn);

?>