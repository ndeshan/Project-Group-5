<?php
include 'nipuna_conn.php';
mysqli_select_db($conn, 'healthandfitnesshub');
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST["name"];
    $story = $_POST["story"];
    $telephone = $_POST["telephone"];

    if(empty($name) || empty($story) || empty($telephone)) {
        $message = "All fields are required.";
    } else {
        if (!preg_match("/^[0-9]{10}$/", $telephone)) {
            $message = "Invalid telephone number format.";
        }
    }

    $datainsert= "INSERT INTO success_stories (name, story, telephone) VALUES ('$name', '$story', '$telephone')";
    if (mysqli_query($conn, $datainsert)) {
        $message = "Success story submitted successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}   
mysqli_close($conn);
echo $message;
?>