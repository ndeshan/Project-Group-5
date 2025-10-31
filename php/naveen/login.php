<?php
session_start();

if(isset($_POST['login_button'])){

    $get_name=$_POST['input_name'];
    $get_password=$_POST['input_password'];

    $servername='localhost:3307';
    $username='root';
    $password='';
    $database='healthandfitnesshub';
    $status=FALSE;

    if( $get_name===NULL && $get_password===NULL){
        die('please fill the all lines!!'.mysqli_connect_error());


    }else{
         $conn=mysqli_connect($servername,$username,$password,$database);

         if(!$conn){
            die('mysql connection error'.mysqli_connect_error());

            }else{


    $sql="SELECT * FROM fitness_login_user WHERE username='$get_name' AND password='$get_password'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows( $result)==1){
        $row=mysqli_fetch_assoc($result);

        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];

        header('Location: ../../pages/Gym_membership_And_Fitness_Articles.php');
        exit();

    }else{
        echo "<br><h3 style='color:red'>Invalid Username or password!!</h3>";

    }


                }

    }
mysqli_close($conn);

}
 

if(isset($_POST['show_button'])){

    $servername='localhost:3307';
    $username='root';
    $password='';
    $database='healthandfitnesshub';
    
 $conn=mysqli_connect($servername,$username,$password,$database);
         if(!$conn){
            die('mysql connection error'.mysqli_connect_error());

            }else{
                    $sql="SELECT username, useremail,password FROM fitness_login_user";
                    $result=mysqli_query($conn,$sql);
                    echo "<table border='0' cellspacing='0' style='width:50%;height:350px;margin-left:auto;margin-right:auto;text-align:center;border:gray solid 1px;background-color:e9ecef;font-family:sans-serif;'> <tr><th style='background-color:#ff8400;'>user name</th> <th style='background-color:#ff8400;'>user mail</th> <th style='background-color:#ff8400;'>password</th></tr> ";
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc( $result)){
                             //   echo "user Name is:".$row['username']."\t";
                              //   echo "email is:".$row['useremail']."\t";
                              //  echo "email is:".$row['password']."<br>";
                        echo "<tr> <td>{$row['username']}</td> <td>{$row['useremail']}</td> <td>{$row['password']}</td></tr>";
                        }

                    echo '</table>';


                    }


            }


}

?>