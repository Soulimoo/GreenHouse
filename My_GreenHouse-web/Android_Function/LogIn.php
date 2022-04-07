 <?php  
 require "Connection.php";  
 $user_Email = $_POST["login_Email"];  
 $user_Password =  $_POST["login_Password"];  
 $sql_query = "select Email from androiduser where Email like '$user_Email' and Password like '$user_Password';";  
 $result = mysqli_query($con,$sql_query);  
 if(mysqli_num_rows($result) >0 )  
 {  
 $row = mysqli_fetch_assoc($result);  
 $FullName =$row["FullName"];  
 echo "Login Success..Welcome ".$FullName;  
 }  
 else  
 {   
 echo "Login Failed.......Try Again..";  
 }  
 ?>  