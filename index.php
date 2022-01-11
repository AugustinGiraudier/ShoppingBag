<?php
session_start();
require_once'./Ressources/fpdf184/fpdf.php';
require_once './Config/Constantes.php';
require_once 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

?>