<?php
session_start();
$_SESSION["error"] = null;

function ReturnError($msg){
    $_SESSION["error"] = $msg;
    header("location:/index.php?action=connexion");
    exit();
}

// check inputs remplis :
if(!isset($_POST["uname"]) || !isset($_POST["psw"])){
    ReturnError("Remplissez tous les champs");
}

$uname = $_POST['uname'];
$psw = $_POST['psw'];

// Check bonnes informations
require "../Modele/ModeleConnexion.php";

$model = new ModeleConnexion();
$login = ($model->getLogin($uname, $psw))->fetchAll();


if($login == null || count($login) == 0){
    ReturnError("Utilisateur ou mot de passe incorrect");
}

//Récupération du compte dans la session :

// Retour à la page principale logé :

?>