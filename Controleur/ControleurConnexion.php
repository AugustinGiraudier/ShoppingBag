<?php

require_once 'Vue/Vue.php';

class ControleurConnexion {

    public function __construct() {
    }

    public function connexion() {
        $vue = new Vue("Connexion");
        $vue->generer(array());
    }
}

