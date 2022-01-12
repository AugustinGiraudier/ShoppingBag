<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurAdmin extends Controleur{

    // Affiche la liste de tous les billets du blog
    public function admin() {

        // verifier que la personne est admin connectée :
        $_SESSION['admin_id'] = 1;
        if(!isset($_SESSION['admin_id'])){
            header("Location:" . _BASE_URL);
            exit();
        }

        // afficher la vue :
        $vue = new Vue("Admin", $this->username);
        $vue->generer(array());
    }

}

