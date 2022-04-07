<?php
    session_start();

    /* DATABASE CONNECTION*/

    require_once "Function/data.php";

    /*DATABASE CONNECTION */

    $errors=array();
    //if user clicks on the login buttopn
    if (isset($_POST['login'])) {
        $function = $_POST['fonction'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Validation
        if ($function == "Choose your Function") {
          $errors['function'] = "Please choose your function";
        }    
        if (empty($email)) {
          $errors['email'] = "Email required";
        }
        if (empty($password)) {
          $errors['Password'] = "Password required";
        }
        if ($function == "Chef") {
            $sql ="SELECT * FROM chef WHERE email=? LIMIT 1 ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['pass'])) {
                //login success
                $_SESSION['idemp'] = $row['idemp'];
                $_SESSION['chef'] = $row['email'];
                header('Location: CHEF/index.php');
                exit();
            }else{
                $errors['login_fail'] = "Wrong credentials";
            }
        }
        elseif ($function == "Admin") {
            $sql="SELECT * FROM admin WHERE email=? LIMIT 1 ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
            //login success
            $_SESSION['idad'] = $row['ID'];
            $_SESSION['user'] = $row['email'];

            header('Location: ADMIN/index.php');
            exit();
            }
            else{
                $errors['login_fail'] = "Wrong credentials";
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
    <title>Login Page</title>


    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!-- Custom Style-->
    <link rel="stylesheet" href="assets/css/Stylee.css">
</head>

<body>

    <div class="container">
        <div class="panel">
            <?php
                if (isset($_GET["success"])) {
                echo 
                '<div class="alert alert-success" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>DONE!! </strong><p> The new admin has been added. They can now log in to their account with their credentials.</p>
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
                    <form action="login.php" method="POST">
                        <div class="titles">
                            <h6>SmartFarming is Here</h6>
                            <h3>Ready to Login</h3>
                        </div>
                        <div>
                            <SELECT id="fonction" name="fonction">
                                <OPTION>Choose your Function</OPTION>
                                <OPTION>Admin</OPTION>
                                <OPTION>Chef</OPTION>
                            </SELECT>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-input">
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-login">Login</button>
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