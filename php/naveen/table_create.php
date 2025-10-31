

<?php
    $serverName='localhost';
    $userName='root';
    $password='';
    $databaseName='healthandfitnesshub';

    $conn=mysqli_connect($serverName,$userName,$password,$databaseName);
  
    if(!$conn){
        die("mysql connection error".mysqli_connect_error());

    }else{
        echo "database created successfully<br>";


        $sql="CREATE TABLE fitness_Login_User(
            username VARCHAR(50),
            useremail VARCHAR(50),
            password VARCHAR(20),
            confirm_password VARCHAR(20)

                )";
          if(mysqli_query($conn,$sql)){
                echo 'table created successfully';


          } else{
                echo 'table creating error ';

          }

    }




?>