<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center  mb-5">
      <div class="col-md-7 text-center">
        <br><br>
        <h3 class="scissors text-center">Notre Magasin</h3>
        <p class="mb-5 lead">Voici les produits que vous pouvez commander sur notre magasin, classé par catégorie : Jus de fruits, Friandises et Fruits</p>
      </div>
    </div>
    <!-- de la -->
    
      <script>
        
        
        function Buy(produitID, div){
          let value = div.parentNode.children[1].value;
          value = value == "" ? '1' : value;
          if(parseInt(value) <= 0){
            let pop = new FragPopUp("red", "erreur : Quantité incorrecte", 3);
            return;
          }
          let url = "http://localhost/index.php?ajax=ajaxAjoutPanier&productID=" + produitID + "&quantity=" + value;
          
          fetch(url)
          .then(async response => {
            const data = await response.json();
            
            if(data.status == "success"){
              let pop = new FragPopUp("green", "achat ajouté au panier", 3);
            }
            else{
              let pop = new FragPopUp("red", "erreur : " + data.status, 3);
            }
            
          });
        }
      </script>

      <?php foreach($products as $cat => $liste):?>
        <br><br><br>
        <h3 class="scissors"> <?=$cat?> </h3>
        <div class="row">
          <div class="col-12">
            <div class="nonloop-block-13 owl-carousel d-flex">
              <?php foreach($liste as $product):?>
                <div class="item-1 h">
                  <img src="<?= "./Ressources/productimages/".$product['image']?>" alt="Image" class="img-fluid">
                  <div class="item-1-contents">
                    <h3> <?= $product["name"]?></h3>
                    <ul>
                      <li class="d-flex"><span> <?= $product["description"]?></span> </li>
                      <li class="d-flex"><span class="price ml-auto"><?= $product["price"]?>€</span></li>
                      <div class="d-flex justify-content-between align-items-center">
                        <img class="pointable" onclick="Buy(<?= $product['id'] ?>,this)" style="height:30px;width:30px;" src="./Ressources/images/shopping-cart-solid.svg" alt="">
                        <input id="roll-<?= $product['id'] ?>" size="10" placeholder="Quantité" type="number">
                      </div>
                    </ul>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach;?>

    <!-- jusqu'a la  -->
  </div>
</div>