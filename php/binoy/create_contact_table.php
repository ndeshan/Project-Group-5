<?php

include('binoy_conn.php');


$sql = "CREATE TABLE IF NOT EXISTS contact_us (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
  echo "Table 'contact_us' created successfully.";
} else {
  echo "Error creating table: " . $conn->error;
}


$conn->close();
?>
