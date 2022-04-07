<?php
    ob_start(); 
    require_once "../data/data.php";
    session_start();
 
    if(!isset($_SESSION['chef']) || empty($_SESSION['chef'])){
        header("location: ../../login.php");
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

    	<title>ADD </title>

    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
         <link href="../fontawesome-free-5.13.0-web/css/all.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    	<link href="../assets/css/my-style.css" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="azure" data-image="../assets/img/serre.jpg">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="../index.php" class="simple-text">
                            My GreenHouse
                        </a>
                    </div>
                    <ul class="nav">
                        <li>
                            <a href="../index.php">
                                <i class="fas fa-house-user"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Contact.php">
                                <i class="fas fa-address-book"></i>
                                <p>Les Employés</p>
                            </a>
                        </li>
                        <li class="dropdown" data-color="green"  >
                            <a class="dropdown-toggle" data-color="green" data-toggle="dropdown" >
                                <i class="fas fa-tasks "></i>
                                <p>Gestion <b class="caret"></b></p>
                            </a>
                            <ul class="dropdown-menu" >
                                <li><a href="#">Sol</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Irrigation</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Eclérage</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Ventilation</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../Graphes.php">
                                <i class="fas fa-chart-area"></i>
                                <p> Graphes</p>
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
                                    <a href="Addemp.php">
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
                                        <a class="dropdown-item" href="../Profil.php?id=<?php echo $idemp ;?>">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content"  style="padding-bottom: 0px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <div class="col-md-12">
                                    <h4 class="title">Creating A New worker</h4>
                                    </div>
                                    <form action="NewEMP.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <input type="hidden" name="id_chef" value="<?php echo $idemp ;?>">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fonction">Fonction</label>  
                                                    <SELECT id="fonction" name="fonction" class="form-control">
                                                        <OPTION>Gardener
                                                    </SELECT>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salair">Salair</label>
                                                    <input id="salair" type="number" name="salair" class="form-control" placeholder="Salair">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="fname" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Téléphone (06/07xxxxxxxx)</label>
                                                    <input type="tel" name="tele" class="form-control" placeholder="Téléphone" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" name="country" class="form-control" placeholder="Country">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="number" name="postal" class="form-control" placeholder="Postal Code">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-fill pull-right">Submit</button>
                                        <div class="clearfix"></div>
                                    </form>
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
                                    <a href="../index.php">
                                        Home
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; 2020 <a href="../index.php" style="color: #7ec9ea;">My GreenHouse</a>, SmartFarming is here
                        </p>
                    </div>
                </footer>
            </div>
        </div> 
    </body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js"></script> 

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
                    <form action="logout.php" method="POST"> 
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>