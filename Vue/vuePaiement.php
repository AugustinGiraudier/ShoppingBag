<div class="container">
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-7">
          <h1 class="mb-3">Connectez vous</h1>
          <br><br>
          <form action="index.php?action=paiement" method="POST"> 
            <div class="container">
              <label for="email"><b>Adresse mail</b></label>
              <input type="text" placeholder="Entrer votre adresse email" name="email" required>

              <label for="adresse"><b>Adresse de livraison</b></label>
              <input type="text" placeholder="Entrer votre adresse" name="adresse" required>

              <button type="submit">Valider</button>
            </div>
          </form>

          <form action="index.php?action=paiement" method="POST"> 
            <div class="container">
              <label for="mode"><b>Choisissez votre moyen de paiement</b></label>
              <input type="text" placeholder="Entrer votre adresse email" name="email" required>
              <button type="submit">Valider</button>
            </div>
          </form>
        </div>
    </div>
</div>