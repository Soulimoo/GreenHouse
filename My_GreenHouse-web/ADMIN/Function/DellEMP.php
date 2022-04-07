<?php 
  require_once "../data/data.php";
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM chef WHERE idemp='$id'";
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([$id]);
      header('Location: ../contact.php?del_suc');
    }
    catch (Exception $e) {
      $e->getMessage();
      echo "Error";
    }
  }
  else {
    header('Location: ../contact.php?del_error');
  }
?>