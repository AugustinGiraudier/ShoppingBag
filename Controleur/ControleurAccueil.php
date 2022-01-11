<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurAccueil extends Controleur{

    // Affiche la liste de tous les billets du blog
    public function accueil() {
        //$billets = $this->billet->getBillets();
        $vue = new Vue("Accueil", $this->username);
        $vue->generer(array());
    }

}

