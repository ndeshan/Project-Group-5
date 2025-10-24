<?php
   
$host = "localhost";
$user = "root";
$password = "1234";
$database = "healthandfitnesshub";

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_error($conn));
}else {
  echo"connection successfull";
}


?>