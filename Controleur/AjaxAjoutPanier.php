<?php

/**
 * Fichier requete Ajax traitant l'ajout d'un item au panier.
 * il attent en GET :
 *  - l'id du produit
 *  - la quantité
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Modele/ModelePanier.php';
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
    $data = ['status' => 'quantite indisponble (reste : ' . $stock . ')'];

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
        // on verifie que l'order n'est pas en cour de paiement :
        if($result[0]['status'] == 1 || $result[0]['status'] == '1'){
            $data = ['status' => "Ajout impossibe, panier en cours d'achat..."];
            echo json_encode($data, JSON_PRETTY_PRINT);
            exit();
        }
        $orderID = $result[0]['id'];
    }
}
// sinon on révupère l'order de la session :
else{
    $result = $model->getSessionOrderID(session_id())->fetchAll();
    // si pas d'order on la crée
    if(count($result) == 0){
        $orderID = $model->creatSessionOrder(session_id());
    }else{
        // on verifie que l'order n'est pas en cour de paiement :
        if($result[0]['status'] == 1 || $result[0]['status'] == '1'){
            $data = ['status' => "Ajout impossibe, panier en cours d'achat..."];
            echo json_encode($data, JSON_PRETTY_PRINT);
            exit();
        }
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