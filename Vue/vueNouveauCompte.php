    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('/Ressources/images/back2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <!-- <div class="col-md-7"> -->
            <br><br><br>
            <div class="d-flex justify-content-between">
              <h1 class="mb-3 mt-5">Nouveau Compte</h1>
              <form style="width:60%;" action="/Controleur/CheckNouveauCompte.php" method="POST">
                <div class="container">
                  <label for="uname"><b>Nom d'utilisateur</b></label>
                  <input type="text" placeholder="Entrer Nom d'utilisateur" name="uname" required>

                  <label for="uname"><b>Prénom</b></label>
                  <input type="text" placeholder="Entrer Prénom" name="prenom" required>

                  <label for="uname"><b>Nom de famille</b></label>
                  <input type="text" placeholder="Entrer Nom de famille" name="nomFamille" required>

                  <label for="psw"><b>Mot de passe</b></label>
                  <input type="password" placeholder="Enter Mot de Passe" name="psw" required>

                  <label for="psw"><b>Repetez Mot de passe</b></label>
                  <input type="password" placeholder="Enter Mot de Passe" name="psw2" required>

                  <?php
                  if(isset($_SESSION["error"])){
                    echo "<p style='color:#dc3545;'>" . $_SESSION["error"] . "</p>";
                    $_SESSION["error"] = null;
                  }
                  ?>

                  <button type="submit">Créer mon compte</button>
                </div>
                <div class="container mt-0">
                  <span style="color:white" class="psw">Déja un compte ? <a href="index.php?action=connexion">Connectez vous !</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>