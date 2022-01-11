<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurConnexion extends Controleur {

    public function connexion() {
        // l'utilisateur est déja connecté, on le renvoie à l'accueil
        $this->ReturnHomeIfUserConnected();
        
        $vue = new Vue("Connexion", $this->username);
        $vue->generer(array());
    }
}

