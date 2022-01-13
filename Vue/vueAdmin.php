<div class="site-section bg-light">
      <div class="container">
        <?php if($AdminIsConnected): ?>
        
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
        
        <div id="admin-table"></div>
        
        
        <script>
          
          DisplayTable();
          
          function DeleteOrder(orderID){
            let url = "http://localhost/index.php?ajax=supressionOrder&orderID=" + orderID;
            
            fetch(url)
            .then(async response => {
              const data = await response.json();
              
              if(data.status == "success"){
                let pop = new FragPopUp("green", "Element supprimé", 2);
              }
              else{
                let pop = new FragPopUp("red", "erreur : " + data.status, 3);
              }
              
            });
            DisplayTable();
          }
          function SendOrder(orderID){
            let url = "http://localhost/index.php?ajax=sendOrder&orderID=" + orderID;
            
            fetch(url)
            .then(async response => {
              const data = await response.json();
              
              if(data.status == "success"){
                let pop = new FragPopUp("green", "Element envoyé", 2);
              }
              else{
                let pop = new FragPopUp("red", "erreur : " + data.status, 3);
              }
              
            });
            DisplayTable();
          }
          
          function DisplayTable(){
            let url = "http://localhost/index.php?ajax=getAdminTable";
            
            fetch(url)
            .then(async response => {
              const data = await response.json();
              var table_div = document.getElementById("admin-table");
              table_div.innerHTML = data;
            });
          }
          
          </script>
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
        <p class="text-light">f18bd055eec95965ee175fa9badd35ae6dbeb98f</p>
</div>