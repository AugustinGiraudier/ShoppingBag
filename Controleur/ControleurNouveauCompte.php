<?php

/**
 * Classe Controleur de la page Nouveau Compte.
 * Vérifie les droits d'acces à la page
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurNouveauCompte extends Controleur {

    public function nouveauCompte() {
        // l'utilisateur est déja connecté, on le renvoie à l'accueil
        $this->ReturnHomeIfUserConnected();

        $vue = new Vue("NouveauCompte", $this->username, false);
        $vue->generer(array());
    }
}

