<?php
session_start();
$_SESSION["error"] = null;

function ReturnError($msg){
    $_SESSION["error"] = $msg;
    header("location:/index.php?action=nouveauCompte");
    exit();
}

// check inputs remplis :
if(!isset($_POST["uname"]) || !isset($_POST["psw"]) || !isset($_POST["psw2"])){
    ReturnError("Remplissez tous les champs");
}

$uname = $_POST['uname'];
$psw = $_POST['psw'];
$psw2 = $_POST['psw2'];

//check different passwords 
if($psw != $psw2){
    ReturnError("Mots de passe différents");
}

// creation du compte :

// Retour à la page principale logé :

?>