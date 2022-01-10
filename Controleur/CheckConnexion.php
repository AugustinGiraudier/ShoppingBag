<?php
session_start();
$_SESSION["error"] = null;

function ReturnError($msg){
    $_SESSION["error"] = $msg;
    header("location:" . $_SESSION['BASE_URL'] . "?action=connexion");
    exit();
}

// check inputs remplis :
if(!isset($_POST["uname"]) || !isset($_POST["psw"])){
    ReturnError("Remplissez tous les champs");
}

$uname = $_POST['uname'];
$psw = $_POST['psw'];

// Check bonnes informations
require_once "./Modele/ModeleConnexion.php";

$model = new ModeleConnexion();
$result = ($model->getLogin($uname, $psw))->fetchAll();

if($result == null || count($result) == 0){
    ReturnError("Utilisateur ou mot de passe incorrect");
}

$login = $result[0];

//Récupération du compte dans la session :
if(!isset($login['customer_id'])){
    ReturnError("Erreur de récupération de l'utilisateur, réessayez...");
}

$_SESSION['user_id'] = $login['customer_id'];

// Retour à la page principale logé :
header("location:" . $_SESSION['BASE_URL']);

?>