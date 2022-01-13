<?php

require_once 'Modele/ModelePanier.php';
$data = null;

// donnees set et utilisateur en droit d'ajouter l'element
if( !isset($_GET['productID'])
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

if(intval($_GET['quantity']) > $stock || intval($_GET['quantity']) <= 0){
    $data = ['status' => 'quantite indisponble'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}

// on regarde si une order est en cours :

$orderID = null;

// Si l'utilisateur est connecté :
if(isset($_SESSION['user_id'])){
    $result = $model->getOrderId($_SESSION['user_id'])->fetchAll();
    // si pas d'order on la crée
    if(count($result) == 0){
        $orderID = $model->creatOrder($_SESSION['user_id']);
    }else{
        $orderID = $result[0]['id'];
    }
}
else{
    $result = $model->getSessionOrderID(session_id())->fetchAll();
    // si pas d'order on la crée
    if(count($result) == 0){
        $orderID = $model->creatSessionOrder(session_id());
    }else{
        $orderID = $result[0]['id'];
    }
}

// on ajoute le produit à l'order :
$model->addProductToOrder($orderID,$_GET['productID'], intval($_GET['quantity']));

// on retourne un succes :
$data = ["status"=>"success"];
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>