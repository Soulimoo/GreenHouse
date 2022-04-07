<?php
  require_once "../data/data.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $Title= $_POST['Title'];
  $message = $_POST['message'];
  $dat = date("Y-m-d H:i:s");
  if (isset($_POST['sendmail'])) {
    $sql = "INSERT INTO contacts VALUES ('','$name','$email','$Title','$message','$dat')";
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([$names, $email,$Title, $message, $dat]);
      header('Location:../index.php?sendmail');
      // echo "DONE!!";
    }
    catch (Exception $e) {
      $e->getMessage();
      echo "Error";
    }	
  }
?>