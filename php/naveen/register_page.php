<?php
if(isset($_POST['submit_values'])){

$get_username=$_POST['username'];
$get_userEmail=$_POST['user_email'];
$get_userPassword=$_POST['password'];
$get_ConfirmPassword=$_POST['confirm_password'];

$usernameCheck="/[^a-zA-Z0-9]/";

if(preg_match($usernameCheck,$get_username)){
    echo "<h4 style='color:red'>You must enter valid username !!!</h4>";

}else if(!filter_var($get_userEmail,FILTER_VALIDATE_EMAIL)){
    echo "<h4 style='color:red'>You must enter valid email !!</h4>";


}else if($get_userPassword!=$get_ConfirmPassword){

    echo "<h4 style='color:red'>Password and Confirm password are not same !!</h4>";


}else{

    $serverName='localhost:3307';
    $userName='root';
    $password='';
    $databaseName='healthandfitnesshub';

    $conn=mysqli_connect($serverName,$userName,$password,$databaseName);
  
    if(!$conn){
        die("mysql connection error".mysqli_connect_error());

    }else{
        
        $sql="INSERT INTO  fitness_Login_User(username,useremail,password,confirm_password)
              VALUES ('$get_username','$get_userEmail','$get_userPassword','$get_ConfirmPassword')";

        if(mysqli_query( $conn,$sql)){
                echo "<br><h4 style='color:green'>Registration successfully</h4>";

        }else{
            echo 'error'. mysqli_error($conn);
        }
    }
mysqli_close($conn);
}


}






?>