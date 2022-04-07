<?php
  require_once "../data/data.php";
  if (isset($_POST['submit'])) {
    //-- Get Employee Data --//
    $email = $_POST['email'];
    // CHECK IF EMPLOYEE EMAIL EXISTS //
    $sql = "SELECT id_jar FROM jardinier WHERE email = $email";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    if ($stmt->rowCount()>0) {
      // email already EXISTS
      echo "Oops...This email already exists!";
      // die();
    }
    // END OF - CHECK IF EMPLOYEE EMAIL EXISTS //
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo $emailErr;
      die();
      $email = $_POST['email'];
    }
    //-- Get Employee Data --//
    $id_chef=$_POST['id_chef'];
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
    //-- Insert Data Into DB --//
    $sql = "INSERT INTO jardinier (id_chef, email, fonction, salair, fname, lname, address,  tele, city,  country, postal, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ississssssis', $id_chef,$email, $fonction, $salair, $fname, $lname, $address, $tele, $city, $country,$postal, $dat);
      if ($stmt->execute()) {
        header('location: ../Contact.php?success');
      } 
    //-- Insert Data Into DB --//

  }
?>