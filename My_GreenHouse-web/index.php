<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/indexPageSerre.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/indexPageSerre.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenLite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <title>My Greenhouse</title>
  </head>
  <body >
    <!-- Options -->
<nav class="navbar">
	<div class="container-fluid">
		<!-- Nav Header -->
		<!-- Nav Collapse -->
		<div class="navbar-collapse collapse" id="collapse-1">
      <!-- Nav Left -->
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><span class="fa fa-home"></span><span class="link"> Home</span></a>
      </div>
			<ul class="nav navbar-nav">
				<!-- What we do -->
				<li class="dropdown">
					<a href="#whatwedo" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="fa fa-tags"></span><span class="link"> What we do</span></a>
				</li>
        <!-- EXTRA  -->
        <li class="dropdown">
          <a href="#EXTRA" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-server"></span><span class="link"> Extra </span></a>
        </li>
        <!-- Why US  -->
        <li class="dropdown">
          <a href="#whyus" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="fas fa-question-circle"></span><span class="link"> Why US </span></a>
        </li>
				<!-- About -->
				<li><a href="#about"><span class="fa fa-info-circle"></span><span class="link"> About</span></a></li>
        <!-- Services -->
        <li class="dropdown">
          <a href="#SERVICES" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-gears"></span><span class="link"> Services</span></a>
        </li>
				<!-- Contact -->
				<li><a href="#CONTACT"><span class="fa fa-phone"></span><span class="link"> Contact</span></a></li>
			</ul>
    </div>
          <!-- Nav Right -->
    <div class="logs ">
     <a href="login.php" class="buttona buttona-5">Login</a> 
    </div>
	</div>
</nav>
    <div id="slider">
    <figure>
    <img src="assets/images/SERRE.jpg" alt>
    <img src="assets/images/SERRE3.jpg" alt>
    </figure>
    </div>
    <!--WHAT WE DO-->
     <div class="whatwedo" id="whatwedo">
       <div class="whatwedosub">
         <div class="whatwedotitle" data-aos="fade-up"><h2>WHAT WE DO ?</h2></div>
         <div class="whatwedodivs">
           <div class="whatwedodiv div1" data-aos="fade-right">
             <div class="cerclemiddle">
            <div class="cercle"><i class="fas fa-cog"></i></div>
          </div>
            <h2>CONTRÔLE AUTOMATISÉ​</h2>
            <div class="textdiv">
              Assure un contrôle automatisé et intelligent des serres pour établir les conditions climatologiques idéales et contrôler la quantité de matière organique à soumettre pour chaque espèce végétale​.
            </div>
           </div>
           <div class="whatwedodiv div2" data-aos="fade-right">
            <div class="cerclemiddle">
           <div class="cercle"><i class="fas fa-hands-helping"></i></div>
         </div>
           <h2>CONTRÔLE ASSISTÉ​ </h2>
           <div class="textdiv">
             Assure un contrôle assisté par ordinateur de ces serres où l'opérateur humain peut intervenir dans le processus de contrôle moyennant une interface appropriée.
           </div>
          </div>
          <div class="whatwedodiv div3" data-aos="fade-left">
            <div class="cerclemiddle">
           <div class="cercle"><i class="fas fa-database"></i></div>
         </div>
           <h2>COLLECTER LES DONNÉ​ES</h2>
           <div class="textdiv">
             collecter l'ensemble des données des serres et de leur environnement à distances via un site Web,
           </div>
          </div>
          <div class="whatwedodiv div4" data-aos="fade-left">
            <div class="cerclemiddle">
           <div class="cercle"><i class="fas fa-poll"></i></div>
         </div>
           <h2>SURVEILLANCE</h2>
           <div class="textdiv">
              surveiller et établir des statistiques et des études stratégiques à distance et faire des prédictions à la base des ces données.
           </div>
          </div>
         </div>
       </div>
     </div>
    </div>
    </div>
    <!--EXTRA SERVICES -->
    <div class="extra" id="EXTRA">
      <div class="extrah2">
      <h2 data-aos="fade-down">EXTRA SERVICES</h2>
    </div>
      <div class="extracontainer">
        <div class="extraleft" data-aos="fade-left">
            <ul>
              <li><i class="fas fa-check"></i>Maintenir des conditions micro-climatiques idéales​</li>
              <li><i class="fas fa-check"></i>Améliorer les pratiques d'irrigation et de fertilisation</li>
              <li><i class="fas fa-check"></i>Contrôler les infections et éviter les épidémies</li>
              <li><i class="fas fa-check"></i>Empêcher les vols et améliorer la sécurité</li>
            </ul>
        </div>
        <div class="extraright" data-aos="fade-right">
            <img src="assets/images/SERRE.jpg" alt="">
        </div>
      </div>
    </div>
    <!--WHY CHOOSE US-->
    <div class="whyus" id="whyus">
      <div class="whyush2">
        <h2 data-aos="fade-up">WHY CHOOSE US ?</h2>
        <div class="whyusdivs">
          <div class="whyusdiv w1 one" onclick="check(1)" data-aos="fade-left">
            <i class="fas fa-handshake"></i>
              <h3>WE OFFER</h3>
          </div>
          <div class="whyusdiv w2" onclick="check(2)" data-aos="fade-up" >
            <i class="fas fa-link"></i>
              <h3>WE SUPPORT</h3>
          </div>
          <div class="whyusdiv w3" onclick="check(3)" data-aos="fade-right">
            <i class="fas fa-bus"></i>
              <h3>WE MANAGE</h3>
          </div>
        </div>
        <div class="whyustext">
          <div class="whyuscontainer con1">
          <p>A huge number of services and works done by high-class experts using the latest technologies. We are here to meet your every demand so you could have no worries about your home!</p>
          <p><em>Call us and our manager will answer any of your question and help you to resolve any issue!</em></p>
        </div>
        <div class="whyuscontainer con2">
          <p>Our support is simply fanatical. The success of your school website is an absolute priority for us. Our support is unlimited and you can talk to one of our friendly, UK based team members on the phone.</p>
          <p><em>Call us and our manager will answer any of your question and help you to resolve any issue!</em></p>
        </div>
        <div class="whyuscontainer con3">
          <p>You want to be able to update your website with no special software and no special technical knowledge. Quickly and easily. It's so easy to update a Greenhouse website, we're told you could get addicted!</p>
          <p><em>Call us and our manager will answer any of your question and help you to resolve any issue!</em></p>
        </div>
      </div>
      </div>
    </div>
    <!--FOOTER-->
    <div class="footer" id="about">
      <div class="footercontainer">
      <div class="d1">
        <div class="d1size">
       <h2>ABOUT</h2>
       <p>L’objectif dans cette application est de créer un système de serre connectée et intelligente. Cette serre est conçue principalement pour établir les conditions nécessaires à la croissance de la plante, qui sont collectées à partir des capteurs préalablement placés dans la serre. Les données sont traitées immédiatement pour obtenir des données plus complexes que nous ne pouvons pas obtenir des capteurs. Les données de haut niveau constituent la base sur laquelle reposent les décisions et les prédictions, ce qui nous donne un aperçu de la situation dans la serre et le futur.</p>
      </div>
    </div>
      <div class="d2" id="SERVICES">
        <div class="d2size">
      <h2>SERVICES</h2>
      <ul>
        <li><i class="fas fa-check"></i>Changement permanent des conditions climatiques.</li>
        <li><i class="fas fa-check"></i>Différentes conditions d’agriculture d’une plante à l’autre.</li>
        <li><i class="fas fa-check"></i>Coût de production des maisons en plastique.</li>
        <li><i class="fas fa-check"></i>Type de capteurs et leur nombre dans chaque maison en plastique.</li>
        <li><i class="fas fa-check"></i>Connexion des serres à Internet.</li>
      </ul>
    </div>
      </div>
      <div class="d3" id="CONTACT">
        <div class="d3size">
   <h2>CONTACT</h2>
    <ul>
      <li><i class="far fa-envelope"></i>Call : (212) 0648434413</li>
      <li><i class="far fa-paper-plane"></i>MyGreenHouse@gmail.com​</li>
      <li><i class="fas fa-map-marker-alt"></i>adresse :FSAC, Km 8 Route d'El Jadida, B.P 5366 Maarif 20100, Casablanca 20000</li>
    </ul>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.30589265023!2d-7.658695085412663!3d33.545427851715914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62cd8f02b714f%3A0xe46a3bdd517247c9!2sFacult%C3%A9%20des%20sciences!5e0!3m2!1sen!2sma!4v1589743780592!5m2!1sen!2sma" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
    </div>
    <div class="copyrights"><small>DESIGNED BY <span>AMINE ISLAH </span>&copy 2020 CORONA TIME</small></div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration:1100,
      });
    </script>
  </body>
</html>
