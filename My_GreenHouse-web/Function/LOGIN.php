<?php 
    session_start();

    $message="";
    //conecting to database
    require_once "data.php";
    //user's data from login.php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //select values from table users
        $question = 'SELECT * FROM admin WHERE email = "'.$email.'" AND password = "'.$password.'" ';
        if ($question) {
            $result = mysqli_query($conn, $question);
            $query1 = mysqli_query($conn, $question);
            $row1 = mysqli_fetch_array($query1);

            if(!$result){
                echo "Question error".mysqli_error($conn);
            }
            else{
                //create variable user
                $user = mysqli_fetch_row($result);
                $pass=password_verify($password, $row1['password']);
                if($user > 0 and $pass){
                    //create session variable log
                    $_SESSION['user']=$_POST['email'];
                    $_SESSION['idad']=$row1["ID"];
                    header('Location: ../ADMIN/index.php');
                }
                else{
                    $question = 'SELECT * FROM chef WHERE email = "'.$email.'" AND password = "'.$password.'" ';
                    $result1 = mysqli_query($conn, $question);
                    $query2 = mysqli_query($conn, $question);
                    $row2 = mysqli_fetch_array($query2);

                    if(!$result1){
                        echo "Question error".mysqli_error($conn);
                    }
                    else{
                        //create variable chef
                        $chef = mysqli_fetch_row($result1);
                        $pass2=password_verify($password, $row1['password']);

                        if($chef > 0 and $pass2){
                            //create session variable log
                            $_SESSION['chef']=$_POST['email'];
                            $_SESSION['idemp']=$row2["idemp"];
                            header('Location: ../CHEF/index.php');
                        }
                        else{
                            $message="invalid Email or Password";
                            header('Location: ../Login.php');

                        }
                    }
                 }
            }
        }
    }
?>