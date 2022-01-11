<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModelePanier.php';

class ControleurPanier extends Controleur {

    public function panier() {
        
        // Si l'utilisateur est non connecté : 
        if(!isset($_SESSION['user_id'])){
            // TODO
            header("Location:" . $_SESSION['BASE_URL']);
            exit();
        }

        $model = new ModelePanier();
        $result = $model->GetPanierWithUserId($_SESSION['user_id'])->fetchAll();

        

        $panier = $result[0];

        $vue = new Vue("Panier", $this->username);
        $vue->generer(array());
    }
}

