<?php
/* DATABASE CONNECTION*/

  require_once "../data/data.php";
  
  /*DATABASE CONNECTION */

  $errors=array();
  $email = "";

  //if user clicks on the sing up buttopn
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['ConfirmPassword'];
    $fonction=$_POST['fonction'];
    $salair=$_POST['salair'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $tele=$_POST['tele'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $postal=$_POST['postal'];
    $dat = date("Y-m-d H:i:s");

    //Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email adress is invalid";
    }
    if (empty($email)) {
      $errors['email'] = "Email required";
    }
    if (empty($password)) {
      $errors['Password'] = "The two Emails do not match required";
    }
    if ($password !== $passwordConf) {
      $errors['Password'] = "The two Passwords do not match";
    }
    //Validation

    $emailQuery = "SELECT * FROM chef WHERE email=? LIMIT 1";
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

      $sql = "INSERT INTO chef (email, pass, fonction, salair, fname, lname, adress, tele, city, country, postal, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssissssssis', $email, $password, $fonction, $salair, $fname, $lname, $address, $tele, $city, $country, $postal, $dat);
      $sql2 = "INSERT INTO chat_login (username) VALUES (?)";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->bind_param('s', $email);
      $stmt2->execute();
      
      if ($stmt->execute()) {

        header('location: ../contact.php?success');
        exit();
      } else {
        $errors['db_error'] = " Database error ";
      }

    }
  }
?>