


<div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <h3 class="scissors text-center">Notre Magasin</h3>
            <p class="mb-5 lead">Voici les produits que vous pouvez commander sur notre magasin, classé par catégorie : Jus de fruits, Friandises et Fruits</p>

            <p class="text-center">
              <a href="#" class="btn btn-primary custom-prev">Prev</a>
              <a href="#" class="btn btn-primary custom-next">Next</a>
            </p>
          </div>

        </div>
        <!-- de la -->
        <div class="row">
          <div class="col-12">
            <div class="nonloop-block-13 owl-carousel d-flex">
              
                <!-- <?php //for (int $i=0;$i<count($jean);$i++){?> -->
              <div class="item-1 h">
                <img src="./Ressources/productimages/".$jean[0]['image']."" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3> <?php echo $jean[0]["name"]; ?></h3>
                  <ul>
                    <li class="d-flex"><span> <?php echo $jean[0]["description"] ;?></span> </li>
                    <li class="d-flex"><span class="price ml-auto"><?php echo $jean[0]["price"] ;?>€</span></li>
                  </ul>
                </div>
                
              </div>

              <div class="item-1 h">
                <img src="./Ressources/images/burger_cereales.jpg" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3>BURGR' Aux Céréales</h3>
                  <ul>
                    <li class="d-flex"><span>BURGR' Cereales simple</span> <span class="price ml-auto">$7.00</span></li>
                    <li class="d-flex"><span>MENU BURGR'</span><span class="price ml-auto">$12.00</span></li>
                  </ul>
                </div>
                
              </div>
              

              <div class="item-1 h">
                <img src="./Ressources/productimages/abricotsSecs.jpg" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3>Black BURGR'</h3>
                  <ul>
                    <li class="d-flex"><span>Shampoo</span> <span class="price ml-auto">$29.00</span></li>
                    <li class="d-flex"><span>Blow Dry</span><span class="price ml-auto">$10.00</span></li>
                    <li class="d-flex"><span>Iron</span><span class="price ml-auto">$32.00</span></li>
                    <li class="d-flex"><span>Brazilian Blow Out</span><span class="price ml-auto">$23.00</span></li>
                    <li class="d-flex"><span>Hair Art</span><span class="price ml-auto">$54.00</span></li>
                  </ul>
                </div>
                
              </div>

            </div>
            
          </div>
        </div>
        <!-- jusqu'a la  -->
      </div>
    </div>