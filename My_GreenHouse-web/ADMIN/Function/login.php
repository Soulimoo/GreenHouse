<?php 
    session_start();
    //user's data from login.php
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    //connection to database
    $connect = mysqli_connect('localhost','root','','mghdatabase');
    //checking connection
    if(!$connect){
        echo "Connection error";
    }
    else{
        //select values from table users
        $question = 'SELECT * FROM admin WHERE email = "'.$email.'" AND password = "'.$password.'" ';
        $result = mysqli_query($connect, $question);
        $query1 = mysqli_query($connect, $question);
            $row1 = mysqli_fetch_array($query1);

        if(!$result){
            echo "Question error".mysqli_error($connect);
        }
        else{
            //create variable user
            $user = mysqli_fetch_row($result);

            if($user > 0){
                //create session variable log
                $_SESSION['user']=$_POST['email'];
                $_SESSION['idad']=$row1["ID"];
                header('Location: ../index.php');
            }
            else{
                header('Location: ../Login.php');
            }
        }
    }
?>