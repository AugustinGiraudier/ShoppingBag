<div class="site-section bg-light">
      <div class="container">
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


        <!-- jusqu'a la  -->
      </div>
    </div>