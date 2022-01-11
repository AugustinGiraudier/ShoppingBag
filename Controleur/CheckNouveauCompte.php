<?php
session_start();
$_SESSION["error"] = null;

function ReturnError($msg){
    $_SESSION["error"] = $msg;
    header("location:" . _BASE_URL . "?action=nouveauCompte");
    exit();
}

// check inputs remplis :
if(!isset($_POST["uname"]) || !isset($_POST["psw"]) || !isset($_POST["psw2"])
    || !isset($_POST['prenom']) || !isset($_POST['nomFamille'])){
    ReturnError("Remplissez tous les champs");
}

// recuperation des variables :
$uname = $_POST['uname'];
$psw = $_POST['psw'];
$psw2 = $_POST['psw2'];
$prenom = $_POST['prenom'];
$nomFamille = $_POST['nomFamille'];

require "./Modele/ModeleConnexion.php";
$model = new ModeleConnexion();

// check userName unique :
if($model->UserExist($uname)){
    ReturnError("Ce nom d'utilisateur existe déjà");
}

// check different passwords :
if($psw != $psw2){
    ReturnError("Mots de passe différents");
}

// check solidité mdp :
if (strlen($psw) < 6 || !preg_match("#[0-9]+#", $psw) || !preg_match("#[a-zA-Z]+#", $psw)) {
    ReturnError("Mot de passe trop faible...\nSa longueur doit etre de 6 au minimum et il doit contenir au moins un chiffre et une lettre");
}

// creation du compte :
$custId = $model->CreateCustomer($uname, $psw, $prenom, $nomFamille);

// mise en session (connexion):
$_SESSION['user_id'] = $custId;

// Retour à la page principale logé :
header("location:" . _BASE_URL);

?>