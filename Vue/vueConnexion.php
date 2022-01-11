<div class="ftco-blocks-cover-1">
  <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('/Ressources/images/back2.jpg')">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-7">
          <h1 class="mb-3">Connectez vous</h1>
          <br><br>
          <form action="index.php?check=connexion" method="POST">
            <div class="container">
              <label for="uname"><b>Nom d'utilisateur</b></label>
              <input type="text" placeholder="Entrer Nom d'utilisateur" name="uname" required>

              <label for="psw"><b>Mot de passe</b></label>
              <input type="password" placeholder="Enter Mot de Passe" name="psw" required>

              <?php
              if(isset($_SESSION["error"])){
                echo "<p style='color:#dc3545;'>" . $_SESSION["error"] . "</p>";
                $_SESSION["error"] = null;
              }
              ?>

              <button type="submit">Connexion</button>
            </div>
            <div class="container">
              <span style="color:white" class="psw">Pas encore de compte ? <a href="index.php?action=nouveauCompte">Créez en un !</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>