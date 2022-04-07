<?php  
 require "Connection.php";  
 $GhName = $_POST["GhName"];
 $GhNumber = $_POST["GhNumber"];
 $Fonction = $_POST["Function"];
 $name = $_POST["FullName"];
 $email = $_POST["Email"];
 $phone = $_POST["Phone"];
 $password = $_POST["Password"];

 $sql_query = "insert into androiduser values('$GhName','$GhNumber','$Fonction','$name','$email','$phone','$password');";
 ?> 