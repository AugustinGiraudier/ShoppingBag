<?php

/**
 * Classe Routeur
 * Associe chaque "action" à la bonne route 
 * que ca soit via les controlleurs ou directement des pages ajax.
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurNouveauCompte.php';
require_once 'Controleur/ControleurPanier.php';
require_once 'Controleur/ControleurMagasin.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlConnexion;
    private $ctrlNouveauCompte;
    private $ctrlPanier;
    private $ctrlMagasin;
    private $ctrlAdmin;

    public function __construct() {
        // instanciation des controleurs :
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlNouveauCompte = new ControleurNouveauCompte();
        $this->ctrlPanier = new ControleurPanier();
        $this->ctrlMagasin= new ControleurMagasin();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            
            /* --- Ajax / API --- */

            if(isset($_GET['ajax'])){
                if($_GET['ajax'] == "ajaxAjoutPanier"){
                    require "./Controleur/AjaxAjoutPanier.php";
                }
                else if($_GET['ajax'] == "supressionOrder"){
                    require "./Controleur/AjaxSupressionOrder.php";
                }
                else if($_GET['ajax'] == "sendOrder"){
                    require "./Controleur/AjaxSendOrder.php";
                }
                else if($_GET['ajax'] == "getAdminTable"){
                    require "./Controleur/AjaxGetOrdersTable.php";
                }
            }
            /* --- Checks --- */

            else if(isset($_GET['check'])){
                if($_GET['check'] == "connexion"){
                    require "./Controleur/CheckConnexion.php";
                }
                else if($_GET['check'] == "nouveauCompte"){
                    require "./Controleur/CheckNouveauCompte.php";
                }
                else if($_GET['check'] == "deconnexion"){
                    require "./Controleur/CheckDeconnexion.php";
                }
                else if($_GET['check'] == "supprimerItem"){
                    require "./Controleur/CheckSuppressionItem.php";
                }
            }

            /* --- Routes --- */

            else if (isset($_GET['action'])) {
                
                if ($_GET['action'] == 'connexion') {
                    $this->ctrlConnexion->connexion();
                }
                else if ($_GET['action'] == 'nouveauCompte') {
                    $this->ctrlNouveauCompte->nouveauCompte();
                }
                else if ($_GET['action'] == 'magasin') {
                    $this->ctrlMagasin->magasin();
                }
                else if ($_GET['action'] == 'panier') {
                    $this->ctrlPanier->panier();
                }
                else if ($_GET['action'] == 'admin') {
                    $this->ctrlAdmin->admin();
                }

                // Si aucune route ne correspond : affichage de l'accueil
                else{
                    $this->ctrlAccueil->accueil();
                }
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", null);
        $vue->generer(array('msgErreur' => $msgErreur));
    }

}
