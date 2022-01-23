<?php

/**
 * Classe abstraite parente de tous les controleurs.
 * Centralise la récupération de l'utilisateur et certains outils
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Vue/Vue.php';
require_once './Modele/ModeleConnexion.php';

abstract class Controleur {

    protected $username = null;

    public function __construct(){
        if(isset($_SESSION['user_id'])){
            // récupération de l'utilisateur
            $model = new ModeleConnexion();
            $result = $model->getUsername($_SESSION['user_id'])->fetchAll();
            if(count($result) == 0){
                $this->username = null;
            }
            else{
                $user = $result[0];
                $this->username = $user['username'];
            }
        }
        else{
            $this->username = null;
        }
    }

    protected function ReturnHomeIfUserConnected(){
        // l'utilisateur est déja connecté, on le renvoie à l'accueil
        if(isset($this->username)){
            header("location:" . _BASE_URL);
            exit();
        }
    }

}
