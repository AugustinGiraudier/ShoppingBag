<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';

class ControleurAdmin extends Controleur{

    // Affiche la liste de tous les billets du blog
    public function admin() {

        // verifier que la personne est admin connectée :

        // la déconnecter pour plus de securité :

        // récupération des orders cloturées :
        
        require_once 'Modele/ModelePanier.php';
        $model = new ModelePanier();
        $result = $model->getOrders()->fetchAll();
        
        // afficher la vue :
        $vue = new Vue("Admin", $this->username);
        $vue->generer(array("orders"=>$result));
    }

}

