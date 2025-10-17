<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post" class="user-feedback-form">
      <div class="form-box">
        <div style="text-align: center;">
          <h1>Feedback Form</h1>
          <p>Your Thoughts and suggestions share with us..</p>
        </div>
        <div class="form-hr"></div>
        <div class="user-feedback-form-inputs">
          <span>Feedback Type</span>
          <div class="user-feedback-radio">
            <input type="radio" name="type" id=""><label>Comments</label>
            <input type="radio" name="type" id=""><label>Suggestions</label>
            <input type="radio" name="type" id=""><label>Questions</label>
          </div>
          <br>
          <div class="user-feedback-textarea">
            <span>Describe Your Feedback:</span>
            <textarea name="textarea" id="" required>
            </textarea>
          </div>
          <div class="user-feedback-input-name" style="padding: 20px;">
            <span>Name:</span>
            <input type="text" name="fname" id="" placeholder="First name">
            <input type="text" name="lname" id="" placeholder="Last name">
          </div>
          <div class="user-feedback-input-email" style="padding: 15px;">
            <span>Email:</span>
            <input type="email" name="email" id="" required>
          </div>
          <input type="submit" value="Submit" name="submit">
        </div>
      </div>
    </form>
</body>
</html>


<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $feedbackType = $_POST["type"];
    $feedbackText=$_POST["textarea"];
    $firstName=$_POST["fname"];
    $lastName=$_POST["lname"];
    $email=$_POST["email"];



    if(!empty($feedbackType) && !empty($feedbackText) && !empty($firstName) && !empty($lastName) && !empty($email)) {
    $message =  "Thank you " . $firstName . " " . $lastName . " for your " . $feedbackType . " feedback! We have received the following message from you: <br><br>" . $feedbackText . "<br><br>";
   }
    else {
     $message =  "<p>Please fill in all the required fields.</p>";
    }
}
    




?>