<?php

/**
 * Classe Controleur de la page Panier.
 * Récpère les données utilisateur aupres du modele et les transmet à la vue.
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Vue/Vue.php';
require_once './Controleur/Controleur.php';
require_once './Modele/ModelePanier.php';

class ControleurPanier extends Controleur {

    public function panier() {
        $step = "";
        $panier = null;
        $arr = null;
        $ERROR = null;
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

        // On vérifie à quelle étape l'utilisateur en est dans sa commande :
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
        // calcul du cout total :
        else if($step == "panier" && isset($panier)){
            foreach($panier as $product){
                $coutTotal += floatval($product['price']) * intval($product['quantity']);
            }
        }
        // cas du paiement et de l'annulation de transaction :
        else if($step == "payement"){
            if(isset($_POST['pay']) && ($_POST['pay'] == "cheque" || $_POST['pay'] == "paypal")){
                $stock_error = $model->removeStocksOfOrder($arr['orderID']);
                if($stock_error != false){
                    $model->setPaiement($_POST['pay'], $arr['orderID'], 0);
                    header("location:" . _BASE_URL . "?action=panier&err=" . $stock_error);
                    exit();
                }
                else{
                    $model->setPaiement($_POST['pay'], $arr['orderID'], 2);
                    header("location:" . _BASE_URL . "?action=panier&success_payment=true");
                    exit();
                }
            }
            else if(isset($_GET['cancel'])){
                $model->setPaiement($_POST['pay'], $arr['orderID'], 0);
                header("location:" . _BASE_URL . "?action=panier");
                exit();
            }
        }

        if(isset($_GET['success_payment'])){
            $success = true;
        }
        else if(isset($_GET['err'])){
            $ERROR = $_GET['err'] . " ne possède plus assez de stock...";
        }

        $vue = new Vue("Panier", $this->username);
        $vue->generer(array("ERROR"=> $ERROR, "paySuccess"=>$success,"step" => $step, "tab_panier"=>$panier, "orderID" => $arr['orderID'], "coutTotal" => $coutTotal));
    }
}

