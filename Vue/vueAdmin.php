<div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <br><br>
            <h3 class="scissors text-center">Liste des commandes en cours</h3>
          </div>

        </div>
        <!-- de la -->

        <table class="table text-center table-striped table-dark">

          <!-- TITRES -->

          <tr>
            <th class="align-middle" scope="col">ID Commande</th>
            <th class="align-middle" scope="col">Nom</th>
            <th class="align-middle" scope="col">Adresse</th>
            <th class="align-middle" scope="col">Email</th>
            <th class="align-middle" scope="col">Paiement</th>
            <th class="align-middle" scope="col">Date</th>
            <th class="align-middle" scope="col">Statut</th>
            <th class="align-middle" scope="col">Envoyé</th>
            <th class="align-middle" scope="col">Supprimer</th>
          </tr>

          <!-- CONTENU -->

          <?php foreach($orders as $order): ?>
            <tr class="table-sm">
              <th class="align-middle" scope="row"><?= "#" . $order['id'] ?></th>
              <td class="align-middle" scope="row"><?= $order['firstname'] . " " .  $order['lastname']?></td>
              <td class="align-middle" scope="row"><?= $order['add1'] . " - " . $order['city']?></td>
              <td class="align-middle" scope="row"><?= $order['email'] ?></td>
              <td class="align-middle" scope="row"><?= $order['payment_type'] ?></td>
              <td class="align-middle" scope="row"><?= str_replace('-','/',$order['date']) ?></td>

              <?php 
                $div_color;
                $div_status;
                $canBeSent = false;
                switch($order['status']){
                  case "1":
                    $div_status = "En attente de paiement";
                    $div_color = "#dc3545";
                    break;
                  case "2":
                    $div_status = "Pret à envoyer";
                    $div_color = "A7CF85";
                    $canBeSent = true;
                    break;
                  case "10":
                    $div_status = "Envoyé";
                    $div_color = "#4983C1";
                    break;
                }
              ?>

              <td class="align-middle" style="color:<?= $div_color?>" scope="row"><?= $div_status ?></td>
              <?php if($canBeSent): ?>
                <td class="align-middle" scope="row"><img class="pointable" style="height:20px;width:auto;" src="<?= _RESSOURCES_DIR . "/images/enveloppe.svg" ?>" alt=""></td>
              <?php else: ?>
                <td class="align-middle" scope="row"><img style="height:20px;width:auto;" src="<?= _RESSOURCES_DIR . "/images/enveloppe_grise.svg" ?>" alt=""></td>
              <?php endif;?>
              <td class="align-middle" scope="row"><img class="pointable" style="height:20px;width:auto;" src="<?= _RESSOURCES_DIR . "/images/trash.svg" ?>" alt=""></td>
            </tr>
          <?php endforeach;?>
        </table>


        <!-- jusqu'a la  -->
      </div>
    </div>