<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModeleProduit.php';

class ControleurMagasin extends Controleur {
    
    public function magasin() {
        // recuperer les données de la table
        $Prod = new ModeleProduit();

        $cat1=$Prod->getCategorie(1)->fetchAll();
        $cat2=$Prod->getCategorie(2)->fetchAll();
        $cat3=$Prod->getCategorie(3)->fetchAll();

        $products = array("Boissons" => $cat1, "Friandises" => $cat2, "Fruits" =>$cat3);

        $vue = new Vue("Magasin", $this->username);
        $vue->generer(array("products"=>$products));
    }
}