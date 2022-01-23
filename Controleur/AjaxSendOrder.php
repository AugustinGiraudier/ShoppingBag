<?php

/**
 * Fichier requete Ajax traitant l'envoie d'une commande (par l'admin)
 * Il attend en GET :
 *  - l'id de l'order
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Modele/ModelePanier.php';
$data = null;

// On vérifié que l'admin est connecté et que les infos GET sont ok :
if(!isset($_SESSION['admin_id'])
    || !isset($_GET['orderID'])){
    header('Content-type: application/json');
    $data = ['status' => 'Parametre incorrect'];

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit();
}

// on envoie l'order :
$model = new ModelePanier();
$model->sendOrder($_GET['orderID']);

// on retourne un succes :
$data = ["status"=>"success"];
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>