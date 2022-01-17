<?php

/**
 * Fichier de déconnexion de l'utilisateur en cours.
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

session_start();

$_SESSION['user_id'] = null;
header("Location:" . _BASE_URL);
exit();
?>