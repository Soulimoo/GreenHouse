<?php
    ob_start(); 
    require_once "data/data.php";
    session_start();
 
    if(!isset($_SESSION['chef']) || empty($_SESSION['chef'])){

      header("location: ../login.php");

      exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width">
    <title> Fan control </title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="assets/css/tyl.css" />


   

  </head>
  <body>

    <div class="bulb">
        <i class="fas fa-fan"></i>
    <div>
    <div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
    </label>
    <br>
    <br>
      <a class="waves-effect waves-light btn" href="index.php">Back Home</a>
  </div>

  
        


    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    <script>
      $(document).ready(function(){
        $('input[type=checkbox]').on('click',function(){
          if($(this).is(':checked')){
            $('.bulb i').css({
              "color" : "white",
              "text-shadow" : "2px 2px 900px white"
            });
          }else{
            $('.bulb i').css({
              "color" : "#e7e9f3",
              "text-shadow" : "none"
            });
          }
        });
      });
    </script>
  </body>
</html>
   