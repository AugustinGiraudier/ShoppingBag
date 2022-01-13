<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center  mb-5">
      <div class="col-md-7 text-center">
        <br><br>

        <?php if($step == "panier"):?>

        <!-- Debut Panier -->

        <h3 class="scissors text-center">Votre Panier</h3>
          <br><br><br>
          <?php if(isset($tab_panier)): ?>
            <div class="col d-flex flex-column align-items-center justify-content-center">
            <?php foreach($tab_panier as $product): ?>
              <div class="card border-dark mt-3 mb-3" style="width:60rem">
                <div class="card-body text-dark d-flex justify-content-between align-items-center">
                  <div class="d-flex justify-content-left align-items-center">
                    <img src="<?php echo _PRODUCTS_IMAGES_DIR . "/" . ($product['image'] == "" ? "dummy.jpg" : $product['image']);?>" alt="" class="mt-0 mb-0 ml-1 mr-3" style="width:70px;height:70px">
                    <div class="ml-3 mr-3">
                      <h5 class="text-left card-title"><?= $product['name'] ?></h5>
                      <p class="text-left card-text"><?= $product['description'] ?></p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-right align-items-center">
                    <div class='ml-2 mr-2 d-flex flex-column align-items-center justify-content-between'>
                      <p class="mt-0 mb-0">Quantité</p>
                      <p class="mt-0 mb-0"><?= $product['quantity'] ?></p>
                    </div>
                    <div style="min-width:70px;" class='ml-4 mr-4 d-flex flex-column align-items-center justify-content-between'>
                      <p class="mt-0 mb-0">Prix unité</p>
                      <p class="mt-0 mb-0"><?= $product['price'] . ' €' ?></p>
                    </div>
                    <div style="min-width:70px;" class='ml-4 mr-4 d-flex flex-column align-items-center justify-content-between'>
                      <p class="mt-0 mb-0">Prix total</p>
                      <p class="mt-0 mb-0"><?= floatval($product['price']) * intval($product['quantity']) . ' €' ?></p>
                    </div>
                    <a href="index.php?check=supprimerItem&orderId=<?= $orderID ?>&itemId=<?= $product['id']?>">
                      <img class="ml-3 mr-2" src="<?php echo _RESSOURCES_DIR . "/images/trash.svg";?>" alt="" style="width:auto;height:20px">
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php else: ?>
            Vous n'avez aucun article dans le panier...
          <?php endif;?>

          <?php if(isset($tab_panier)): ?>
            <h5 class="mt-3 mb-3">Valeur totale : <?= $coutTotal;?> €</h5>
            <a href="index.php?action=panier&setAddress=true"><button type="button" class="btn btn-outline-success">Passer commande</button></a>
          <?php endif;?>

          <?php if($paySuccess):?>
          <script>
            new FragPopUp("green", "Paiement accepté", 4);
          </script>
          <?php endif;?>

          <!-- Fin Panier -->
          
          <?php elseif($step == "adresse"):?>
            
          <!-- Debut adresse entrée -->
          
          <div class="text-left col-md-7">
            <h3 class="scissors">Votre adresse</h3>
          </div>

          <form action="index.php?action=panier" method="POST">
            <div class="container">

              <label for="prenom"><b>Prénom</b></label>
              <input type="text" placeholder="Entrer Prénom" name="prenom" required>

              <label for="nom"><b>Nom</b></label>
              <input type="text" placeholder="Entrer Nom" name="nom" required>

              <label for="adresse"><b>Adresse</b></label>
              <input type="text" placeholder="Entrer Adresse" name="adresse" required>

              <label for="ville"><b>Ville</b></label>
              <input type="text" placeholder="Entrer Ville" name="ville" required>

              <label for="cp"><b>Code postal</b></label>
              <input type="text" placeholder="Entrer Code Postal" name="cp" required>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Entrer Email" name="email" required>

              <label for="tel"><b>Téléphone</b></label>
              <input type="text" placeholder="Entrer Numero Téléphone" name="tel" required>

              <?php
              if(isset($ERROR)){
                echo "<p style='color:#dc3545;'>" . $ERROR . "</p>";
              }
              ?>

              <button class="mt-3" type="submit">Continuer</button>
            </div>
          </form>

          <!-- Fin adresse entrée -->
            
          <?php elseif($step == "payement"):?>

          <!-- Debut payement entrée -->

          <div class="text-left col-md-7">
            <h3 class="scissors">Paiement</h3>
          </div>

          <form action="index.php?action=panier" method="POST">
            <div class="container">

            <label class="mt-3" for="pay">Choisissez un mode de paiement</label>
            <select name="pay">
              <option value="cheque">Cheque</option>
              <option value="paypal">Paypal</option>
            </select>

              <?php
              if(isset($ERROR)){
                echo "<p style='color:#dc3545;'>" . $ERROR . "</p>";
              }
              ?>

              <button class="mt-5" type="submit">Continuer</button>
            </div>
          </form>

          <!-- Fin payement entrée -->

          <?php endif;?>

        </div>
      </div>
    </div>
  </div>
</div>
