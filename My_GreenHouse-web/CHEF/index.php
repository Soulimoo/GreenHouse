<?php
ob_start();
    require_once "data/data.php";
    session_start();
 
  if(!isset($_SESSION['chef']) || empty($_SESSION['chef'])){

      header("location: ../login.php");

      exit;
    }

    $chef = $_SESSION['chef'];
    $idemp=$_SESSION['idemp'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="#">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>My GreenHouse </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
     <link href="fontawesome-free-5.13.0-web/css/all.min.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="assets/css/button.css" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

	<link href="assets/css/my-style.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azure" data-image="assets/img/serre.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class="simple-text">
                        My GreenHouse
                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="fas fa-house-user"></i>
                            <p>Accueil</p>
                        </a>
                    </li>
                    <li>
                        <a href="Contact.php">
                            <i class="fas fa-address-book"></i>
                            <p>Les Employés</p>
                        </a>
                    </li>
                    <li class="dropdown" data-color="green">
                        <a class="dropdown-toggle" data-color="green"  data-toggle="dropdown" >
                            <i class="fas fa-tasks "></i>
                            <p>Gestion <b class="caret"></b></p>
                        </a>
                        <ul class="dropdown-menu" >
                                <li><a href="lampe.php">Lampe</a></li>
                                <li class="divider"></li>
                                <li><a href="irrig.php">Irrigation</a></li>
                                <li class="divider"></li>
                                <li><a href="reservoir.php">Reservoir</a></li>
                                <li class="divider"></li>
                                <li><a href="ventilateur.php">Ventilation</a></li>                                                         
                        </ul>
                    </li>
                    <li>
                        <a href="Graphes.php">
                            <i class="fas fa-chart-area"></i>
                            <p> Graphes</p>
                        </a>
                    </li>
                    <br>
                    <br>
                    
                    <li>
                        <a href="#" class="Ahmed" onclick="document.getElementById('modal-wrapper').style.display='block'">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Star Chating
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-refresh"></i> Actualiser
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a>
                                    <i class="fas fa-user-tie"></i> <?php echo $chef;?>
                                </a>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"><b class="caret"></b></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="Profil.php?id=<?php echo $idemp ;?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="Setting.php?id=<?php echo $idemp ;?>">
                                            <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Setting
                                        </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Your graphs are ready</h4>
                                </div>
                                <div class="content"> 
                                    <iframe src="Graphepage.php" width="100%" height="600px"></iframe>
                                    <a href="Graphes.php">
                                        <button type="submit" name="sendmail" class="btn btn-info btn-fill pull-right">See More</button>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-glance">
                                <div class="header">
                                    <h4 class="title">Gestion</h4>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-swimming-pool"></i>
                                            <a href="reservoir.php"><h5 style="padding-left: 10px;">reservoir</h5></a>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fas fa-tint"></i>
                                            <a href="irrig.php"><h5>Irrigation</h5></a>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fas fa-lightbulb"></i>
                                            <a href="lampe.php"><h5>Eclérage</h5></a>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="fas fa-wind"></i>
                                            <a href="ventilateur.php"><h5>Ventilation</h5></a>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        Your GreenHouse is here
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="index.php">
                                    Home
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; 2020 <a href="index.php" style="color: #7ec9ea;">My GreenHouse</a>, SmartFarming is here
                    </p>
                </div>
            </footer>
        </div>
    </div> 
</body>
	
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="#"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script> 

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! 
	<script src="assets/js/demo.js"></script> -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="Function/logout.php" method="POST"> 
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-wrapper" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <h4 class="modal-title">My Greenhouse Chat</h4>
            </div>
            <div class="modal-body">
                <?php

                    include('Function/chat_function/database_connection.php');


                    $message = '';

                    if(isset($_POST['chat']))
                    {
                        $query = "
                            SELECT * FROM chat_login 
                            WHERE username = :username
                        ";
                        $statement = $connect->prepare($query);
                        $statement->execute(
                            array(
                                ':username' => $_POST["chatemail"]
                            )
                        );  
                        $count = $statement->rowCount();
                        if($count > 0 )
                        {
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                                if ($row['username'] == $chef) {
                                    $_SESSION['user_id'] = $row['user_id'];
                                    $_SESSION['username'] = $row['username'];
                                    $sub_query = "
                                    INSERT INTO chat_login_details 
                                    (user_id) 
                                    VALUES ('".$row['user_id']."')
                                    ";
                                    $statement = $connect->prepare($sub_query);
                                    $statement->execute();
                                    $_SESSION['login_details_id'] = $connect->lastInsertId();
                                    header('location:Messages.php');
                                }
                            }
                        }
                        else
                        {
                            $message = '<label>Wrong Username</labe>';
                        }
                    }


                    ?>
                <p>Inser your email to start chating.</p>
                <form method="POST">

                    <div class="form-group">
                        <input type="email" name="chatemail" class="form-control" placeholder="Email">
                    </div>
                    <button type="submit" name="chat" class="btn btn-primary">Join</button>
                </form>
            </div>
        </div>
    </div>
</div> 
<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>