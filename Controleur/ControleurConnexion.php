<?php

/**
 * Classe Controleur de la page de Connexion.
 * Vérifie les differentes conditions d'acces à la page
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Vue/Vue.php';
require_once './Controleur/Controleur.php';

class ControleurConnexion extends Controleur {

    public function connexion() {
        // l'utilisateur est déja connecté, on le renvoie à l'accueil
        $this->ReturnHomeIfUserConnected();
        
        $vue = new Vue("Connexion", $this->username, false);
        $vue->generer(array());
    }
}

