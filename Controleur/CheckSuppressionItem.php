<?php

/**
 * Fichier de supression d'un item du panier.
 * il attent en GET :
 *  - l'id de la commande
 *  - l'id du produit
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

session_start();
$_SESSION["error"] = null;

function ReturnPanier(){
    header("Location:" . _BASE_URL . "?action=panier");
    exit();
}

if(!isset($_GET['orderId']) || !isset($_GET['itemId'])){
    ReturnPanier();
}

$orderID = $_GET['orderId'];
$productID = $_GET['itemId'];

require_once "./Modele/ModelePanier.php";
$model = new ModelePanier();

// verification que la personne a bien cree l'order
if(isset($_SESSION['user_id'])){
    $custID = $model->GetCustomerID($orderID)->fetchAll();
    if(count($custID) == 0 || $custID[0]['customer_id'] != $_SESSION['user_id']){
        ReturnPanier();
    }
}
else{
    $result = $model->GetSessionID($orderID)->fetchAll();
    if(count($result) == 0 || $result[0]['session'] != session_id()){
        ReturnPanier();
    }
}


// supression de la ligne
$model->deleteItem($orderID, $productID);

// retour au panier
ReturnPanier();

?>