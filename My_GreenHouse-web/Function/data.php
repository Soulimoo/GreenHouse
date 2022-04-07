<?php
  /* DATABASE CONNECTION*/

  global $conn;
  $conn = mysqli_connect('localhost','root','','mghdatabase');
  if(!$conn){
      die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
  }
  /*DATABASE CONNECTION */
?>
