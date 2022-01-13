<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModelePanier.php';

class ControleurPanier extends Controleur {

    public function panier() {
        $step = "";
        $panier = null;
        $arr = null;
        $coutTotal = 0;
        $success = false;

        $model = new ModelePanier();

        
        // on recupere ses articles ajoutés :
        if(isset($_SESSION['user_id'])){
            $arr = $model->GetPanierWithUserId($_SESSION['user_id']);
        }else{
            $arr = $model->GetPanierWithSessionId(session_id());
        }
        $result = $arr['result']->fetchAll();
        // Si on a un resultat :
        if(count($result) != 0){
            $panier = $result;
        }

        switch($arr["orderStatus"]){
            case 0:
                if(isset($_GET['setAddress'])){
                    $step = "adresse";
                    break;
                }
                else{
                    $step = "panier";
                    break;
                }
            case 1:
                $step = "payement";
                break;
        }

        // On vérifie si le form d'adresse est remplis :
        if($step == "panier"
        && isset($_POST['prenom'])
        && isset($_POST['nom'])
        && isset($_POST['ville'])
        && isset($_POST['cp'])
        && isset($_POST['adresse'])
        && isset($_POST['email'])
        && isset($_POST['tel'])
        ){
            $model->addAdress($arr['orderID'],$_POST['prenom'], $_POST['nom'], 
            $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['tel'], $_POST['email']);
            header("location:" . _BASE_URL . "?action=panier");
        }
        else if($step == "panier" && isset($panier)){
            foreach($panier as $product){
                $coutTotal += floatval($product['price']) * intval($product['quantity']);
            }
        }
        else if($step == "payement" && isset($_POST['pay'])){
            var_dump($_POST['pay']);
            if($_POST['pay'] == "cheque" || $_POST['pay'] == "paypal"){
                $model->setPaiement($_POST['pay'], $arr['orderID']);
                header("location:" . _BASE_URL . "?action=panier&success_payment=true");
            }
        }

        if(isset($_GET['success_payment'])){
            $success = true;
        }

        $vue = new Vue("Panier", $this->username);
        $vue->generer(array("paySuccess"=>$success,"step" => $step, "tab_panier"=>$panier, "orderID" => $arr['orderID'], "coutTotal" => $coutTotal));
    }
}

