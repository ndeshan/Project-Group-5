
<?php
include 'nipuna_conn.php';

mysqli_select_db($conn, 'healthandfitnesshub');

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $feedbackType = $_POST["type"];
    $feedbackText=$_POST["textarea"];
    $firstName=$_POST["fname"];
    $lastName=$_POST["lname"];
    $email=$_POST["email"];

  $datainsert= "INSERT INTO user_feedback (feedback_type, feedback_text, first_name, last_name, email) VALUES ('$feedbackType', '$feedbackText', '$firstName', '$lastName', '$email')";

    if (mysqli_query($conn, $datainsert) === TRUE) {
        $message = "Feedback submitted successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);

  
}
    


?>