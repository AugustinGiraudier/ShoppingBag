<html lang="fr">

  <head>
    <title>BURGR' | <?= $page_title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/Ressources/fonts/icomoon/style.css">

    <link rel="stylesheet" href="./Ressources/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Ressources/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./Ressources/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="./Ressources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./Ressources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./Ressources/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="./Ressources/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./Ressources/css/style.css">

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
                <a href="index.php">BURGR'</a>
              </div>
            </div>
            <div class="col-9  text-right"> 
              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu ml-auto ">
                  <li class="<?php echo $page_title == 'Accueil' ? 'active' : '' ?>">
                    <a href="index.php" class="nav-link">Accueil</a>
                  </li>
                  <li class="<?php echo $page_title == 'Achat' ? 'active' : '' ?>">
                    <a href="services.html" class="nav-link">Acheter</a>
                  </li>
                  <li class="<?php echo $page_title == 'Panier' ? 'active' : '' ?>">
                    <a href="index.php?action=panier" class="nav-link">Panier</a>
                  </li>
                  <li class="<?php echo $page_title == 'Connexion' || $page_title == "NouveauCompte" ? 'active' : '' ?>">
                    <?php if(isset($username)): ?>
                      <a href="index.php?check=deconnexion" class="nav-link"><?= $username ?> (déconnexion)</a>
                    <?php else: ?>
                      <a href="index.php?action=connexion" class="nav-link">Connexion</a>
                    <?php endif; ?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </header>

    <!-- CONTENU TEMPLATE -->
    
    <?= $contenu ?>
    
    <!-- ---------------- -->

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="./Ressources/images/img_1.jpg" alt="Image" class="img-fluid mb-5">
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

    <script src="./Ressources/js/jquery-3.3.1.min.js"></script>
    <script src="./Ressources/js/jquery-migrate-3.0.0.js"></script>
    <script src="./Ressources/js/popper.min.js"></script>
    <script src="./Ressources/js/bootstrap.min.js"></script>
    <script src="./Ressources/js/owl.carousel.min.js"></script>
    <script src="./Ressources/js/jquery.sticky.js"></script>
    <script src="./Ressources/js/jquery.waypoints.min.js"></script>
    <script src="./Ressources/js/jquery.animateNumber.min.js"></script>
    <script src="./Ressources/js/jquery.fancybox.min.js"></script>
    <script src="./Ressources/js/jquery.stellar.min.js"></script>
    <script src="./Ressources/js/jquery.easing.1.3.js"></script>
    <script src="./Ressources/js/bootstrap-datepicker.min.js"></script>
    <script src="./Ressources/js/aos.js"></script>

    <script src="./Ressources/js/main.js"></script>

  </body>

</html>
