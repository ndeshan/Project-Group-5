 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
     <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post" class="contact-form">
      <p class="name-lable">Name:</p>
      <input type="text" name="name" class="name" required />
      <p class="email-lable">Email:</p>
      <input type="email" name="email" class="email" required />

      <p class="number-lable">Number:</p>
      <input type="text" name="number" class="number" required />
      <p class="comment-lable">Comment:</p>
      <textarea name="textarea" id="textarea"></textarea>
      <input type="submit" class="button" id="button" value="Submit" />
    </form>
 </body>
 </html>

<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $comment = $_POST["textarea"];

    if(!empty($name) && !empty($email) && !empty($number) && !empty($comment)) {
    $message =  "Thank you " . $name . " for reaching out to us! We have received the following message from you: <br><br>" . $comment . "<br><br>";
   }
    else {
     $message =  "<p>Please fill in all the required fields.</p>";
    }
}
?>