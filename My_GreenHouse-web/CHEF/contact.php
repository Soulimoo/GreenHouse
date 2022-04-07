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

    $sql = "SELECT * FROM jardinier";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" href="#">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    	<title>Les Employés</title>
    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
         <link href="fontawesome-free-5.13.0-web/css/all.min.css" rel="stylesheet" />
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
                        <li>
                            <a href="index.php">
                                <i class="fas fa-house-user"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li  class="active">
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
                    </ul>
                </div>
            </div>  
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="Contact.php">
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
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-posts">
                                    <?php
                                    if (isset($_GET["success"])) {
                                    echo 
                                    '<div class="alert alert-success" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>DONE!! </strong><p> The new worker has been added.</p>
                                    </div>'
                                    ;
                                    }
                                    elseif (isset($_GET["del_suc"])) {
                                    echo 
                                    '<div class="alert alert-warning" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>DELETED!! </strong><p> The worker has been successfully removed.</p>
                                    </div>'
                                    ;
                                    }
                                    elseif (isset($_GET["del_error"])) {
                                    echo 
                                    '<div class="alert alert-danger" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                    </div>'
                                    ;
                                    }
                                    elseif (isset($_GET["edit_suc"])) {
                                    echo 
                                    '<div class="alert alert-success" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>DELETED!! </strong><p> The worker has been successfully updating.</p>
                                    </div>'
                                    ;
                                    }
                                    elseif (isset($_GET["edit_error"])) {
                                    echo 
                                    '<div class="alert alert-danger" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>ERROR!! </strong><p> There was an error during updating this record. Please try again.</p>
                                    </div>'
                                    ;
                                    }
                                    ?>  

                                    <div class="header">
                                        <h4 class="title">Employés
                                        <a href="Function/Addemp.php" class="btn btn-success btn-fill">Ajouté</a></h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form-inline pull-right">
                                                    <div class="form-group">
                                                        <label class="sr-only">Chercher</label>
                                                        <input type="input" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="search by names">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table id="myTable" class="table" cellspacing="0" width="100%">
                                            <?php 
                                            if (mysqli_num_rows($query)==0) {
                                            echo "No Gardeners Here :("; 
                                            }?>
                                            <thead>
                                                <th>Nom complet</th>
                                                <th>Email</th>
                                                <th>Fonction</th>
                                                <th>Salaires</th>
                                                <th>Téléphone</th>
                                                <th>Date de début</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php  while ($row = mysqli_fetch_array($query)):?>
                                                <?php if (!($row["id_chef"]!="$idemp")):?>  
                                                <tr>
                                                    <td><?php echo $row["fname"]." ".$row["lname"]; ?></td>
                                                    <td><?php echo $row["email"]; ?></td>
                                                    <td><?php echo $row["fonction"];?></td>
                                                    <td><?php echo $row["tele"];?></td>
                                                    <td><?php echo $row["salair"]."$"; ?></td>
                                                    <td><?php echo $row["date"]; ?></td>
                                                    <td>
                                                        <a href="Function/DellEMP.php?id=<?php echo $row["id_jar"]; ?>" class="btn btn-danger">Delete</a>
                                                        <a href="Function/UpdateEMP.php?id=<?php echo $row["id_jar"]; ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php endif?>
                                            <?php endwhile; ?>
                                        </table>
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

    <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>


    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js" type="text/javascript"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="#"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js" type="text/javascript"></script> 

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

</html>