<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center  mb-5">
      <div class="col-md-7 text-center">
        <br><br>
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
                      <h5 class="card-title"><?= $product['name'] ?></h5>
                      <p class="card-text"><?= $product['description'] ?></p>
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
                    <img class="ml-3" src="" alt="" style="width:150px;height:30px">
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          <?php else: ?>
            Vous n'avez aucun article dans le panier...
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>
