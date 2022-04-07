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
	<title>Lampe Control</title>
	<!-- Compiled and minified CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="fontawesome-free-5.13.0-web/css/all.min.css" rel="stylesheet" />
    <link href="assets/css/Style.css" rel="stylesheet"/>
</head>
<body>

	<div class="bulb">

		<i class="fas fa-lightbulb"></i>
	</div>
	<div class="switch">
    <label>
      Turn Off
      <input type="checkbox">
      <span class="lever"></span>
      Turn On
    </label>
    <br>
    <br>
      <a class="waves-effect waves-light btn" href="index.php">Back Home</a>
  </div>



	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
    					"color" : "black",
    					"text-shadow" : "none"
    				});
    			}
    		});
    	});
    </script>
</body>
</html>