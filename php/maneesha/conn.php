<?php
   
$host = "localhost";
$user = "root";
$password = "";
$database = "healthandfitnesshub";

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_error($conn));
}



?>