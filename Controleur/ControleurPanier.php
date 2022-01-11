<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModelePanier.php';

class ControleurPanier extends Controleur {

    public function panier() {
        
        $panier = null;

        // Si l'utilisateur est connecté : 
        if(isset($_SESSION['user_id'])){

            // on recupere ses articles ajoutés :
            $model = new ModelePanier();
            $arr = $model->GetPanierWithUserId($_SESSION['user_id']);
            $result = $arr['result']->fetchAll();
            // Si on a un resultat :
            if(count($result) != 0){
                $panier = $result;
            }
        }

        $vue = new Vue("Panier", $this->username);
        $vue->generer(array("tab_panier"=>$panier, "orderID" => $arr['orderID']));
    }
}

