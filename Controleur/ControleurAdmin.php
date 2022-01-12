<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModeleConnexion.php';

class ControleurAdmin extends Controleur{

    // Affiche la liste de tous les billets du blog
    public function admin() {

        $AdminIsLoged = false;
        $ERROR = null;

        // cas de la deconnexion
        if(isset($_GET['step']) && $_GET['step'] == "deconnexion"){
            $_SESSION['admin_id'] = null;
        }
        else{
            // verifier que la personne est admin connectée :
            if(!isset($_SESSION['admin_id'])){
                // Verification du formulaire :
                if(isset($_POST['uname']) && isset($_POST['psw'])){

                    $model = new ModeleConnexion();
                    $result = $model->getLoginAdmin($_POST['uname'], $_POST['psw'])->fetchAll();
                    if(count($result) == 0){
                        $ERROR = "Informations incorrectes";
                    }
                    else{
                        $_SESSION['admin_id'] = $result[0]['id'];
                        $AdminIsLoged = true;
                    }
                }
                else{
                    $ERROR = "Informations manquantes";
                }
            }else{
                $AdminIsLoged = true;
            }
        }   
        
        // afficher la vue :
        $vue = new Vue("Admin", $this->username);
        $vue->generer(array("AdminIsConnected"=>$AdminIsLoged, "ERROR"=>$ERROR));
    }

}

