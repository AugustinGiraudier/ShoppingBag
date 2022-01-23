<div class="site-section bg-light">
      <div class="container">
        <?php if($AdminIsConnected): ?>
        
          <?php if(isset($orderInfos) && count($orderInfos) != 0):?>

            <div class="d-flex flex-row mt-3">
              <a href="index.php?action=admin">← Retour à la liste des commandes</a>
            </div>

            <div class="row justify-content-center  mb-5">
            <div class="col-md-7 text-center">
              <br><br>
              <h3 class="scissors text-center">Commande numero <?=$_GET['order_id']?> :</h3>
            </div>

            <table class="mt-5 table table-sm table-striped table-dark">
              <tr>
                <th>Nom article</th>
                <th>Quantité</th>
              </tr>
              <tr>
                <td><?=$orderInfos['name']?></td>
                <td><?=$orderInfos['quantity']?></td>
              </tr>
            </table>
          <?php else:?>
            <div class="d-flex flex-row-reverse mt-3">
              <a href="index.php?action=admin&step=deconnexion">Déconnexion administrateur</a>
            </div>

            <div class="row justify-content-center  mb-5">
            <div class="col-md-7 text-center">
              <br><br>
              <h3 class="scissors text-center">Liste des commandes en cours</h3>
            </div>
              
            </div>
            <!-- de la -->
            
            <div class="d-flex justify-content-center">
              <img onclick="DisplayTable()" class="pointable mr-3" style='height:30px;width:auto;' src="<?= _RESSOURCES_DIR . "/images/refresh.svg"?>" alt="">
              <p class="pointable" onclick="DisplayTable()">Rafraichir la table</p>
            </div>

            <div class="mt-3" id="admin-table"></div>
            
            
            <script>
              
              DisplayTable();
              
              function DeleteOrder(orderID){
                let url = "<?= _BASE_URL ?>/index.php?ajax=supressionOrder&orderID=" + orderID;
                
                fetch(url)
                .then(async response => {
                  const data = await response.json();
                  
                  if(data.status == "success"){
                    let pop = new FragPopUp("green", "Element supprimé", 2);
                  }
                  else{
                    let pop = new FragPopUp("red", "erreur : " + data.status, 3);
                  }
                  DisplayTable();
                  
                });
              }
              function SendOrder(orderID){
                let url = "<?= _BASE_URL ?>/index.php?ajax=sendOrder&orderID=" + orderID;
                
                fetch(url)
                .then(async response => {
                  const data = await response.json();
                  
                  if(data.status == "success"){
                    let pop = new FragPopUp("green", "Element envoyé", 2);
                  }
                  else{
                    let pop = new FragPopUp("red", "erreur : " + data.status, 3);
                  }
                  DisplayTable();
                  
                });
              }
              
              function DisplayTable(){
                let url = "<?= _BASE_URL ?>/index.php?ajax=getAdminTable";
                
                fetch(url)
                .then(async response => {
                  const data = await response.json();
                  var table_div = document.getElementById("admin-table");
                  table_div.innerHTML = data;
                });
              }
              
              </script>
            <?php endif;?>
          <?php else: ?>


          <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <br><br>
            <h3 class="scissors text-center">Connexion Admin</h3>
          </div>

          <form action="index.php?action=admin" method="POST">
            <div class="container">
              <label for="uname"><b>Nom d'utilisateur</b></label>
              <input type="text" placeholder="Entrer Nom d'utilisateur" name="uname" required>

              <label for="psw"><b>Mot de passe</b></label>
              <input type="password" placeholder="Enter Mot de Passe" name="psw" required>

              <?php
              if(isset($ERROR)){
                echo "<p style='color:#dc3545;'>" . $ERROR . "</p>";
              }
              ?>

              <button type="submit">Connexion</button>
            </div>
          </form>


          
          <?php endif; ?>
          
          <!-- jusqu'a la  -->
        </div>
</div>