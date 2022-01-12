<?php

require_once 'Modele/ModelePanier.php';
$data = null;

// donnees set et utilisateur en droit d'ajouter l'element
if(!isset($_SESSION['admin_id'])
    || !isset($_GET['orderID'])){
    header('Content-type: application/json');
    $data = ['status' => 'Parametre incorrect'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}

// on supprime l'order :
$model = new ModelePanier();
$model->deleteOrder($_GET['orderID']);

// on retourne un succes :
$data = ["status"=>"success"];
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>