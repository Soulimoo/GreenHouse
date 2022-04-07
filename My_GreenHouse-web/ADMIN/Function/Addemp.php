<?php
    ob_start(); 
    require_once "../data/data.php";
    session_start();
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        header("location: login.php");
        exit;
    }
    $user = $_SESSION['user'];
    $ID=$_SESSION['idad'];

    $errors=array();
    $email = "";

  //if user clicks on the sing up buttopn
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $passwordConf = $_POST['ConfirmPassword'];
    $fonction=$_POST['fonction'];
    $salair=$_POST['salair'];
    $dat = date("Y-m-d H:i:s");

    //Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email adress is invalid";
    }
    if (empty($email)) {
      $errors['email'] = "Email required";
    }
    if (empty($password)) {
      $errors['Password'] = "Password required";
    }
    if (empty($passwordConf)) {
      $errors['ConfirmPassword'] = "Confirm Password required";
    }
    if ($password !== $passwordConf) {
      $errors['Password'] = "The two Passwords do not match";
    }
    if ($fonction == "Choose your Function") {
      $errors['function'] = "Please choose your function";
    }
    if ($fonction == "Gardener") {
      $errors['function'] = "Dude!!! chosose chef and chef will creat Gardeners";
    }
    if (empty($salair)) {
      $errors['salair'] = "Salair Required";
    }

    $emailQuery = "SELECT * FROM chef WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
      $errors['email'] = "Email ralreasy existes";
    }

    if (count($errors) === 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $dat = date("Y-m-d H:i:s");

      $sql = "INSERT INTO chef (email, pass, fonction, salair, date) VALUES (?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssis', $email, $password, $fonction, $salair, $dat);
      $sql2 = "INSERT INTO chat_login (username) VALUES (?)";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->bind_param('s', $email);
      $stmt2->execute();
      
      if ($stmt->execute()) {

        header('location: Addemp.php?success');
        exit();
      } else {
        $errors['db_error'] = " Database error ";
      }

    }
  }


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
            <div class="sidebar" data-color="green" data-image="../assets/img/serre.jpg">
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
                        <li>
                            <a href="../Graphes.php">
                                <i class="fas fa-chart-area"></i>
                                <p> Graphes </p>
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
                                        <i class="fas fa-user-tie"></i> <?php echo $user;?>
                                    </a>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"><b class="caret"></b></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="../Profil.php?id=<?php echo $ID ;?>">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="../Setting.php?id=<?php echo $ID ;?>">
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Add New Chef</h4>
                                    <?php
                                     if (isset($_GET["success"])) {
                                     echo 
                                        '<div class="alert alert-success" >
                                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                         <strong>DONE!! </strong><p> Chef has been added.</p>
                                        </div>'
                                                 ;
                                            }
                                    ?>
                                    <?php if (count($errors) > 0): ?> 
                                    <div class="alert alert-danger" >
                                        <?php foreach ($errors as $key => $error): ?>
                                            <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="content" style="">
                                    <form action="Addemp.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label><span style="color: red;">*</span>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Password"> Password </label><span style="color: red;">*</span>
                                                    <input type="Password" id="Password" name="Password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ConfirmPassword"> Confirm Password </label><span style="color: red;">*</span>
                                                    <input type="Password" id="ConfirmPassword" name="ConfirmPassword" class="form-control" placeholder="Confirm Password">
                                                    <div id="msg" style="padding-left: 10px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ConfirmPassword"> Function </label><span style="color: red;">*</span>
                                                    <SELECT id="fonction" name="fonction" class="form-control">
                                                        <OPTION>Choose your Function</OPTION>
                                                        <OPTION>Chef</OPTION>
                                                        <OPTION>Gardener</OPTION>
                                                    </SELECT>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ConfirmPassword"> Salair </label><span style="color: red;">*</span>
                                                    <input type="number" name="salair" class="form-control" placeholder="Salair">
                                                </div>
                                            </div>
                                        </div>
                                            <p><span style="color: red;">*</span>: Required Field
                                            <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">ADD</button></p>
                                        <div class="clearfix"></div>
                                    </form>
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