<?php
include 'nipuna_conn.php';
echo "<br>";
mysqli_select_db($conn, 'healthandfitnesshub');
$message = "";

    $selectquery = "SELECT * FROM success_stories";
    if(mysqli_query($conn, $selectquery)){
        $result = mysqli_query($conn, $selectquery);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    foreach ($data as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Story: " . $row['story'] . "<br>";
        echo "Telephone: " . $row['telephone'] . "<br><br>";
    }

?>