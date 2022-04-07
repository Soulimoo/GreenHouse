<?php
  session_start();

  /* DATABASE CONNECTION*/

  require_once "Function/data.php";
  
  /*DATABASE CONNECTION */

  $errors=array();
  $email = "";

  //if user clicks on the sing up buttopn
  if (isset($_POST['singup'])) {
    $email = $_POST['email'];
    $emailConf = $_POST['Confirmemail'];
    $password = $_POST['Password'];
    $passwordConf = $_POST['ConfirmPassword'];

    //Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email adress is invalid";
    }
    if (empty($email)) {
      $errors['email'] = "Email required";
    }
    if ($email !== $emailConf) {
      $errors['email'] = "The two Emails do not match";
    }
    if (empty($password)) {
      $errors['Password'] = "The two Emails do not match required";
    }
    if ($password !== $passwordConf) {
      $errors['Password'] = "The two Passwords do not match";
    }

    $emailQuery = "SELECT * FROM admin WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
      $errors['email'] = "Email already existes";
    }


    if (count($errors) === 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $dat = date("Y-m-d H:i:s");

      $sql = "INSERT INTO admin (email, password, date) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sss', $email, $password, $dat);
      $sql2 = "INSERT INTO chat_login (username) VALUES (?)";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->bind_param('s', $email);
      $stmt2->execute();
      
      if ($stmt->execute()) {
        // login user
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['email'] = $email;
        // set flash messages
        $_SESSION['message'] = "The new admin is added";
        $_SESSION['alert-class'] = "alert-success";
        header('location: login.php?success');
        exit();
      } else {
        $errors['db_error'] = " Database error ";
      }

    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Admin</title>


    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <!-- Custom Style-->
    <link rel="stylesheet" href="assets/css/Stylee.css">
</head>

<body>

    <div class="container">
        <div class="panel">
            <?php if (count($errors) > 0): ?> 
                <div class="alert alert-danger" >
                    <?php foreach ($errors as $key => $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col liquid">
                    <h4><i class="fas fa-user-secret"></i> MyGreenHouse</h4>

                    <!-- Owl-Carousel -->

                    <div class="owl-carousel owl-theme">
                        <img src="assets/images/super_serre.jpg" alt="" class="login_img">
                        <img src="assets/images/SERRE3.jpg" alt="" class="login_img">
                        <img src="assets/images/SERRE.jpg" alt="" class="login_img">
                    </div>
                </div>
                <div class="col login">
                    <a href="index.php"><button  type="button" class="btn btn-signup">HOME</button></a>
                    <form action="Newadmin.php" method="POST">
                        <div class="titles">
                            <h6>SmartFarming is Here</h6>
                            <h3>New Admin</h3>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Confirmemail" id="Confirmemail" placeholder="Confirme your Email" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div id="msg2" style="padding-left: 10px;"></div>
                        <div class="form-group">
                            <input type="password" name="Password" id="Password" placeholder="Password" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirme your Password" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div id="msg" style="padding-left: 10px;"></div>
                        <button type="submit" name="singup" class="btn btn-login">Sing UP</button>
                        <p class="text-center" >
                            
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 1
            });
        });
    </script>
    <script>
                $(document).ready(function(){
                    $("#Confirmemail").keyup(function(){
                         if ($("#email").val() != $("#Confirmemail").val()) {
                             $("#msg2").html("Email do not match").css("color","red");
                         }else{
                             $("#msg2").html("Email matched").css("color","green");
                        }
                  });
            });
    </script>
    <script>
                $(document).ready(function(){
                    $("#ConfirmPassword").keyup(function(){
                         if ($("#Password").val() != $("#ConfirmPassword").val()) {
                             $("#msg").html("Password do not match").css("color","red");
                         }else{
                             $("#msg").html("Password matched").css("color","green");
                        }
                  });
            });
            </script>  
    <script>
        function(b) {
  function c() {
    g.detach().trigger("closed.bs.alert").remove()
  }
  var e = a(this),
    f = e.attr("data-target");
  f || (f = e.attr("href"), f = f && f.replace(/.*(?=#[^\s]*$)/, ""));
  var g = a(f);
  b && b.preventDefault(), g.length || (g = e.closest(".alert")), g.trigger(b = a.Event("close.bs.alert")), b.isDefaultPrevented() || (g.removeClass("in"), a.support.transition && g.hasClass("fade") ? g.one("bsTransitionEnd", c).emulateTransitionEnd(d.TRANSITION_DURATION) : c())
}
    </script>
</body>

</html>