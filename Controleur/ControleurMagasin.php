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
        // $opla=var_export($opla,true);

        $vue = new Vue("Magasin", $this->username);
        // mettre des cles dans le tableau
        $vue->generer(array("boissons"=>$cat1 , "friandises"=>$cat2 , "fruits"=>$cat3));
    }
}