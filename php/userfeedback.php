
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

    if(empty($feedbackType) || empty($feedbackText) || empty($firstName) || empty($lastName) || empty($email)) {
        $message = "All fields are required.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format.";
        }
    }


  $datainsert= "INSERT INTO user_feedback (feedback_type, feedback_text, first_name, last_name, email) VALUES ('$feedbackType', '$feedbackText', '$firstName', '$lastName', '$email')";

    if (mysqli_query($conn, $datainsert) === TRUE) {
        $message = "Feedback submitted successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    echo $message;
  
}
    


?>