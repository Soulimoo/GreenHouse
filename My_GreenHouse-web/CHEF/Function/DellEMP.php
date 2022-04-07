<?php 
  require_once "../data/data.php";
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM jardinier WHERE id_jar='$id'";
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