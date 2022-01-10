<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurNouveauCompte.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlConnexion;
    private $ctrlNouveauCompte;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlNouveauCompte = new ControleurNouveauCompte();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if(isset($_GET['check'])){
                if($_GET['check'] == "connexion"){
                    require "./Controleur/CheckConnexion.php";
                }
                else if($_GET['check'] == "nouveauCompte"){
                    require "./Controleur/CheckNouveauCompte.php";
                }
            }
            else if (isset($_GET['action'])) {
                
                if ($_GET['action'] == 'connexion') {
                    $this->ctrlConnexion->connexion();
                }
                else if ($_GET['action'] == 'nouveauCompte') {
                    $this->ctrlNouveauCompte->nouveauCompte();
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
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
