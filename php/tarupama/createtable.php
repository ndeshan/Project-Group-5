<?php
<<<<<<< HEAD
$conn = mysqli_connect("localhost", "root", "", "php_group_project");
=======
$conn = mysqli_connect("localhost", "root", "", "healthandfitnesshub");
>>>>>>> 6f35819a47c36e0f880a918b41cbca0b05a99ab8
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    plan_no INT NOT NULL,
    comment VARCHAR(1000) NOT NULL,
    date DATE NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table 'reviews' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>