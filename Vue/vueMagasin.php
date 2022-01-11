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

        <br><br><br>
        <h3 class="scissors"> Boissons </h3>


        <div class="row">
          <div class="col-12">
            <div class="nonloop-block-13 owl-carousel d-flex">

              <script>

                function Buy(produitID, quantity){
                  let url = "http://localhost/index.php?ajax=ajaxAjoutPanier&productID=" + produitID + "&quantity=" + quantity;

                  fetch(url)
                      .then(async response => {
                          const data = await response.json();
                      });
                }

              </script>


              <?php for ($i=0;$i<count($boissons);$i++) :?>
                <div class="item-1 h">
                  <img src="<?php echo "./Ressources/productimages/".$boissons[$i]['image']; ?>" alt="Image" class="img-fluid">
                  <div class="item-1-contents">
                    <h3> <?php echo $boissons[$i]["name"]; ?></h3>
                    <ul>
                      <li class="d-flex"><span> <?php echo $boissons[$i]["description"] ;?></span> </li>
                      <li class="d-flex"><span class="price ml-auto"><?php echo $boissons[$i]["price"] ; ?>€</span></li>
                      <img class="caddie" onclick="Buy(<?= $boissons[$i]['id'] ?>,1)" style="height:30px;width:30px;" src="./Ressources/images/shopping-cart-solid.svg" alt="">
                    </ul>
                  </div>
                </div>
              <?php endfor; ?>

            </div>
          </div>
        </div>  
        
        <br><br><br>
        <h3 class="scissors"> Friandises </h3>
            
        
        <div class="row">
          <div class="col-12">   
            <div class="nonloop-block-13 owl-carousel d-flex">
                <?php for ($i=0;$i<count($friandises);$i++) :?> 
                <div class="item-1 h">
                    <img src="<?php echo "./Ressources/productimages/".$friandises[$i]['image']; ?>" alt="Image" class="img-fluid">
                    <div class="item-1-contents">
                    <h3> <?php echo $friandises[$i]["name"]; ?></h3>
                    <ul>
                        <li class="d-flex"><span> <?php echo $friandises[$i]["description"] ;?></span> </li>
                        <li class="d-flex"><span class="price ml-auto"><?php echo $friandises[$i]["price"] ; ?>€</span></li>
                        <img class="caddie" onclick="Buy(<?= $friandises[$i]['id'] ?>,1)" style="height:30px;width:30px;" src="./Ressources/images/shopping-cart-solid.svg" alt="">
                    </ul>
                    </div>
                </div>
                <?php endfor; ?>
            </div>   
          </div>
        </div>

        <br><br><br>
        <h3 class="scissors"> Fruits </h3>

        <div class="row">
          <div class="col-12">
            <div class="nonloop-block-13 owl-carousel d-flex">
                <?php for ($i=0;$i<count($fruits);$i++) :?> 
                <div class="item-1 h">
                    <img src="<?php echo "./Ressources/productimages/".$fruits[$i]['image']; ?>" alt="Image" class="img-fluid">
                    <div class="item-1-contents">
                    <h3> <?php echo $fruits[$i]["name"]; ?></h3>
                    <ul>
                        <li class="d-flex"><span> <?php echo $fruits[$i]["description"] ;?></span> </li>
                        <li class="d-flex"><span class="price ml-auto"><?php echo $fruits[$i]["price"] ; ?>€</span></li>
                        <img class="caddie" onclick="Buy(<?= $fruits[$i]['id'] ?>,1)" style="height:30px;width:30px;" src="./Ressources/images/shopping-cart-solid.svg" alt="">
                    </ul>
                    </div>
                </div>
                <?php endfor; ?>
            </div>  
            
          </div>
        </div>
        <!-- jusqu'a la  -->
      </div>
    </div>