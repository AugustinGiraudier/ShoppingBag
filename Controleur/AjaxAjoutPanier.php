<?php

require_once 'Modele/ModelePanier.php';
$data = null;

// donnees set et utilisateur en droit d'ajouter l'element
if(!isset($_GET['userID']) 
    || $_GET['userID'] != $_SESSION['user_id']
    || !isset($_GET['productID'])
    || !isset($_GET['quantity'])){
    header('Content-type: application/json');
    $data = ['status' => 'Parametres incorrects'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}

// on regarde si le stock est suffisant :
$model = new ModelePanier();
$result = $model->getStock($_GET['productID'])->fetchAll();

if(count($result) == 0){
    $data = ['status' => 'Parametres incorrects'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}
$stock = $result[0]['quantity'];

if(intval($_GET['quantity']) > $stock){
    $data = ['status' => 'quantite indisponble'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}

// on regarde si une order est en cours :
$result = $model->getOrderId($_SESSION['user_id'])->fetchAll();
$orderID = null;
// si pas d'order on la crée
if(count($result) == 0){
    $model->creatOrder($_SESSION['user_id']);
}else{
    $orderID = $result[0]['id'];
}

// on ajoute le produit à l'order :
$model->addProductToOrder($orderID,$_GET['productID'], intval($_GET['quantity']));

// on retourne un succes :
$data = ["status"=>"succes"];
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>