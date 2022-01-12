<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurAccueil extends Controleur{

    // Affiche la liste de tous les billets du blog
    public function accueil() {
        
        $vue = new Vue("Accueil", $this->username, false);
        $vue->generer(array());
    }

}

