<?php

require_once 'Vue/Vue.php';

class ControleurNouveauCompte {

    public function __construct() {
    }

    public function nouveauCompte() {
        $vue = new Vue("NouveauCompte");
        $vue->generer(array());
    }
}

