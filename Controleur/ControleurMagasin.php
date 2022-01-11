<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModeleProduit.php';

class ControleurMagasin extends Controleur {
    
    public function magasin() {
        // recuperer les données de la table
        $test = new ModeleProduit();
        $opla=$test->getCategorie(1)->fetchAll();

        // $opla=var_export($opla,true);

        $vue = new Vue("Magasin", $this->username);
        // mettre des cles dans le tableau
        $vue->generer(array("jean"=>$opla));
    }
}