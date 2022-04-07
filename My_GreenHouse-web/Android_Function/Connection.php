 <?php  
 $db_name = "mghdatabase";  
 $mysql_user = "root";  
 $mysql_pass = "";  
 $server_name = "localhost";  
 $con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
 if (!$con) {
 	//echo "Connection Error...".mysql_connect_error();
 }else{
 	//echo "<h3>Database conected success...</h3>";
 }
 ?>  