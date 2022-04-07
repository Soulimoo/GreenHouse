<?php 
  require_once "../data/data.php";
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM contacts WHERE ID='$id'";
    $stmt = $db->prepare($sql);
    try {
      $stmt->execute([$id]);
      header('Location: ../Messages.php?delM_suc');
    }
    catch (Exception $e) {
      $e->getMessage();
      echo "Error";
    }
  }
  else {
    header('Location: ../Messages.php?delM_error');
  }
?>