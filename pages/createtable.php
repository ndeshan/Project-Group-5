<?php
$conn = mysqli_connect("localhost", "root", "", "php_group_project");
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