<html lang="fr">

  <head>
    <title>BAKER' | <?= $page_title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <script src="<?=_RESSOURCES_DIR?>/js/PopUp.js"></script>

    <link rel="stylesheet" href="/Ressources/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/aos.css">
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/popup.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?=_RESSOURCES_DIR?>/css/style.css">

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

    <header class="site-navbar site-navbar-target" role="banner" <?php if($showNavBar) echo "style='background-color: #000000'";?>;>
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.php">BAKER'</a>
              </div>
            </div>
            <div class="col-9  text-right"> 
              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu ml-auto ">
                  <li class="<?php echo $page_title == 'Accueil' ? 'active' : '' ?>">
                    <a href="index.php" class="nav-link">Accueil</a>
                  </li>
                  <li class="<?php echo $page_title == 'Magasin' ? 'active' : '' ?>">
                    <a href="index.php?action=magasin" class="nav-link">Magasin</a>
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
        <div class="row d-flex align-items-center">
          <div class="col-lg-3">
            <img style="height: 150px;width:auto;" src="./Ressources/images/foot.jpg" alt="Image" class="img-fluid mb-5">
            <h2 class="footer-heading mb-3" style="color:#dc3545">A propos de nous</h2>
                <p>La rencontre de la subtilité parisienne et du savoir faire auvergnat... Faites vous votre propre avis !</p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4" style="color:#dc3545">Autres liens</h2>
                <ul class="list-unstyled">
                  <li><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">A propos</a></li>
                  <li><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Termes de service</a></li>
                  <li><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Confidentialité</a></li>
                  <li><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Nous contacter</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Augustin Giraudier & Arthur Secher-Cabot</a>
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="<?=_RESSOURCES_DIR?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery-migrate-3.0.0.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/popper.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/bootstrap.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/owl.carousel.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.sticky.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.waypoints.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.animateNumber.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.fancybox.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.stellar.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/jquery.easing.1.3.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/aos.js"></script>
    <script src="<?=_RESSOURCES_DIR?>/js/main.js"></script>

  </body>

</html>
