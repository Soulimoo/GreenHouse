<?php
  session_start();

  /* DATABASE CONNECTION*/

  require_once "data.php";
  
  /*DATABASE CONNECTION */

  $errors=array();
  $email = "";

  //if user clicks on the sing up buttopn
  if (isset($_POST['singup'])) {
    $email = $_POST['email'];
    $emailConf = $_POST['Confirmemail'];
    $password = $_POST['Password'];
    $passwordConf = $_POST['ConfirmPassword'];

    //Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email adress is invalid";
    }
    if (empty($email)) {
      $errors['email'] = "Email required";
    }
    if ($email !== $emailConf) {
      $errors['email'] = "The two Emails do not match";
    }
    if (empty($password)) {
      $errors['Password'] = "The two Emails do not match required";
    }
    if ($password !== $passwordConf) {
      $errors['Password'] = "The two Passwords do not match";
    }

    $emailQuery = "SELECT * FROM admin WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
      $errors['email'] = "Email ralreasy existes";
    }


    if (count($errors) === 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $dat = date("Y-m-d H:i:s");

      $sql = "INSERT INTO admin (email, password, date) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sss', $email, $password, $dat);
      
      if ($stmt->execute()) {
        // login user
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['email'] = $email;
        // set flash messages
        $_SESSION['message'] = "The new admin is added";
        $_SESSION['alert-class'] = "alert-success";
        header('location: ../login.php?success');
        exit();
      } else {
        $errors['db_error'] = " Database error ";
      }

    }
  }
?>