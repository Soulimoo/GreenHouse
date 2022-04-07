<?php
 session_start();
 
  /* DATABASE CONNECTION*/

  global $conn;
  $conn = mysqli_connect('localhost','root','','mghdatabase');
  if(!$conn){
      die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
  }
    try{
      $db = new PDO('mysql:host=localhost;dbname=mghdatabase;charset=utf8','root','');
    }
    catch(Exception $e){
      die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
    }
  
  /*DATABASE CONNECTION */
 $error = false;
 if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // prevent sql injections/ clear user invalid inputs
  $dat = date("Y-m-d H:i:s");
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $confirm_pass = trim($_POST['password2']);
  $confirm_pass = strip_tags($confirm_pass);
  $confirm_pass = htmlspecialchars($confirm_pass);
    
  if(empty($email)){
    $error = true;
    $emailError = "Please enter email.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
    $error = true;
    $emailError = "Please enter a valid email.";
  }
  if(empty($pass)){
    $error = true;
    $passError = " Please enter password.";
  }
  if(empty($confirm_pass)){
    $error = true;
    $confirm_password_err = " Please enter confirm password.";
  } else{
        $confirm_pass = trim($confirm_pass);
        if(empty($passError) && ($pass != $confirm_pass)){
      $error = true;
            $confirm_password_err = " Password did not match.";
        }
    }   
    
  if (!$error) {
     $res=mysqli_query($conn,"SELECT ID FROM admin WHERE email='$email'");
     $row=mysqli_fetch_array($res);
     $count = mysqli_num_rows($res); 
   
    if( $count == 1) {
      $error = true;
      $emailExistError = "This email is already registered.";
    } else {
      // Prepare an insert statement
      $sql = "INSERT INTO admin VALUES ('','$email', '$pass','$dat')";
       
      if($stmt = mysqli_prepare($conn, $sql)){
        $password = hash('sha256', $pass); // password hashing using SHA256
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        
                
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
          // Redirect to home page
          $_SESSION['user'] = $email;
          $_SESSION["loggedin"] = true;
          header("location: Login.php");
        } else{
          echo "Something went wrong. Please try again later.";
        }
      }
    }
  }
 }
?>