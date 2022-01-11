


<div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <br><br>
            <h3 class="scissors text-center">Notre Magasin</h3>
            <p class="mb-5 lead">Voici les produits que vous pouvez commander sur notre magasin, classé par catégorie : Jus de fruits, Friandises et Fruits</p>

            <!-- <p class="text-center">
              <a href="" class="btn btn-primary custom-prev">Prev</a>
              <a href="" class="btn btn-primary custom-next">Next</a>
            </p> -->
          </div>

        </div>
        <!-- de la -->

        <br><br><br>
        <h3 class="scissors"> Boissons </h3>


        <div class="row">
          <div class="col-12">
            <div class="nonloop-block-13 owl-carousel d-flex">
              
                 <?php for ($i=0;$i<count($boissons);$i++) :?> 
              <div class="item-1 h">
                <img src="<?php echo "./Ressources/productimages/".$boissons[$i]['image']; ?>" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3> <?php echo $boissons[$i]["name"]; ?></h3>
                  <ul>
                    <li class="d-flex"><span> <?php echo $boissons[$i]["description"] ;?></span> </li>
                    <li class="d-flex"><span class="price ml-auto"><?php echo $boissons[$i]["price"] ; ?>€</span></li>
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