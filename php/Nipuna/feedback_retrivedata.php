
<?php 
include 'nipuna_conn.php';

echo"<br>";
echo"<br>";


mysqli_select_db($conn, 'healthandfitnesshub');

$retrievequery = "SELECT * FROM user_feedback";
if(mysqli_query($conn, $retrievequery)){
    $result = mysqli_query($conn, $retrievequery);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($conn);
}

foreach ($data as $row) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Feedback Type: " . $row['feedback_type'] . "<br>";
    echo "Feedback Text: " . $row['feedback_text'] . "<br>";
    echo "First Name: " . $row['first_name'] . "<br>";
    echo "Last Name: " . $row['last_name'] . "<br>";
    echo "Email: " . $row['email'] . "<br><br>";
}







mysqli_close($conn);
?>