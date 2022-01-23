<?php

/**
 * Classe Controleur de la page Magasin.
 * Récpère les données des produits aupres du modele et les transmet à la vue.
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Vue/Vue.php';
require_once './Controleur/Controleur.php';
require_once './Modele/ModelePanier.php';

class ControleurMagasin extends Controleur {
    
    public function magasin() {
        // recuperer les données de la table
        $Prod = new ModelePanier();

        $cat1=$Prod->getproductsWithCategorie(1)->fetchAll();
        $cat2=$Prod->getproductsWithCategorie(2)->fetchAll();
        $cat3=$Prod->getproductsWithCategorie(3)->fetchAll();

        $products = array("Boissons" => $cat1, "Friandises" => $cat2, "Fruits" =>$cat3);

        $vue = new Vue("Magasin", $this->username);
        $vue->generer(array("products"=>$products));
    }
}