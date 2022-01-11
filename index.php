<?php

session_start();
$pos = strpos($_SERVER['REQUEST_URI'], '?');
$_SESSION['BASE_URL'] = $pos == -1 ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, $pos);

require 'Controleur/Routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();