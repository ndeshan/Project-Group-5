<?php


if(isset($_POST['login_button'])){

    $get_name=$_POST['input_name'];
    $get_password=$_POST['input_password'];

    $servername='localhost:3307';
    $username='root';
    $password='';
    $database='web_project_fitness';
    $status=FALSE;

    if( $get_name===NULL && $get_password===NULL){
        die('please fill the all lines!!'.mysqli_connect_error());


    }else{
         $conn=mysqli_connect($servername,$username,$password,$database);

         if(!$conn){
            die('mysql connection error'.mysqli_connect_error());

            }else{

        //echo 'mysql connection successfully<br>';
        
                $sql="SELECT username, confirm_password FROM fitness_login_user";
                $result=mysqli_query($conn,$sql);

                         if(mysqli_num_rows($result)>0){

                                while($row=mysqli_fetch_assoc($result)){
                                 // echo 'username  '.$row["username"].'  password  '.$row['confirm_password'].'<br>';

                                  if($row["username"]== $get_name && $row['confirm_password']== $get_password){

                                                $status=TRUE;
                                                break;

                                             }else{
                                                      $status=FALSE;
                                                
                                               
                                             }

                                 }


                }
                    if( $status){

                            echo '<br>Login successfully !!!';

                            header('Location: ../pages/index.html');
                            exit();

                    }else {
                            echo "<br><h4 style='color:red'>Password and Username does not match!!.Please check!!</h4>";
                                               

                    }


                }

    }
mysqli_close($conn);

}
 

if(isset($_POST['show_button'])){

    $servername='localhost:3307';
    $username='root';
    $password='';
    $database='web_project_fitness';
    
 $conn=mysqli_connect($servername,$username,$password,$database);
         if(!$conn){
            die('mysql connection error'.mysqli_connect_error());

            }else{
                    $sql="SELECT username, useremail,password FROM fitness_login_user";
                    $result=mysqli_query($conn,$sql);
                    echo "<table border='1' cellspacing='0'> <tr><th>user name</th> <th>user mail</th> <th>password</th></tr> ";
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