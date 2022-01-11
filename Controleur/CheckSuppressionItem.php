<?php
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

// verification que la personne en session a bien cree l'order

if(!isset($_SESSION['user_id'])){
    ReturnPanier();
}

require_once "Modele/ModelePanier.php";
$model = new ModelePanier();
$custID = $model->GetCustomerID($orderID);

if($custID != $_SESSION['user_id']){
    ReturnPanier();
}

// supression de la ligne
$model->deleteItem($orderID, $productID);

// retour au panier
ReturnPanier();

?>