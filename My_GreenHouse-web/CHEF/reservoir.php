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
<html>
<head>
	<title>Tank Control</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/Styleresrv.css">
</head>
<body>

	<div class="cup" id="cup">

	</div>
	<div class="switch">
    <label>
      Stop
      <input type="checkbox">
      <span class="lever"></span>
      Fil tank
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
            $('.cup').css({
				"animation": "animate 10s linear infinite"
            });
          }else{
            $('.cup').css({
            		"animation": ""
            });
          }
        });
      });
    </script>
</body>
</html>