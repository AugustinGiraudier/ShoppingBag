<html lang="en">

  <head>
    <title>BURGR' | Nouveau Compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="/Ressources/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Ressources/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/Ressources/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/Ressources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/Ressources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/Ressources/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/Ressources/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Ressources/css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html">BURGR'</a>
              </div>
            </div>

            <div class="col-9  text-right">
               
              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.html" class="nav-link">Accueil</a></li>
                  <li><a href="services.html" class="nav-link">Acheter</a></li>
                  <li><a href="barber-shop.html" class="nav-link">Panier</a></li>
                  <li><a href="about.html" class="nav-link">Connexion</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('/Ressources/images/back2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-3">Nouveau Compte</h1>
              <br><br>
              <form action="/Controleur/CheckConnexion.php" method="POST">
                <div class="container">
                  <label for="uname"><b>Nom d'utilisateur</b></label>
                  <input type="text" placeholder="Entrer Nom d'utilisateur" name="uname" required>

                  <label for="psw"><b>Mot de passe</b></label>
                  <input type="password" placeholder="Enter Mot de Passe" name="psw" required>

                  <label for="psw"><b>Repetez Mot de passe</b></label>
                  <input type="password" placeholder="Enter Mot de Passe" name="psw" required>

                  <button type="submit">Créer mon compte</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="/Ressources/images/img_1.jpg" alt="Image" class="img-fluid mb-5">
            <h2 class="footer-heading mb-3">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p> 
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="/Ressources/js/jquery-3.3.1.min.js"></script>
    <script src="/Ressources/js/jquery-migrate-3.0.0.js"></script>
    <script src="/Ressources/js/popper.min.js"></script>
    <script src="/Ressources/js/bootstrap.min.js"></script>
    <script src="/Ressources/js/owl.carousel.min.js"></script>
    <script src="/Ressources/js/jquery.sticky.js"></script>
    <script src="/Ressources/js/jquery.waypoints.min.js"></script>
    <script src="/Ressources/js/jquery.animateNumber.min.js"></script>
    <script src="/Ressources/js/jquery.fancybox.min.js"></script>
    <script src="/Ressources/js/jquery.stellar.min.js"></script>
    <script src="/Ressources/js/jquery.easing.1.3.js"></script>
    <script src="/Ressources/js/bootstrap-datepicker.min.js"></script>
    <script src="/Ressources/js/aos.js"></script>

    <script src="/Ressources/js/main.js"></script>

  </body>

</html>