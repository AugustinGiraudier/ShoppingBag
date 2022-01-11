<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurMagasin extends Controleur {

    public function magasin() {
        
        $vue = new Vue("Magasin", $this->username);
        $vue->generer(array());
    }
}