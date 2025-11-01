<?php

include('binoy_conn.php');


$sql = "CREATE TABLE contact_us (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  comment TEXT
)";


if ($conn->query($sql) === TRUE) {
  echo "Table 'contact_us' created successfully.";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>
