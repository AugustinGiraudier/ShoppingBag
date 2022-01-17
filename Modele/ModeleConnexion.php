<?php

/**
 * Classe Modele de la page Connexion.
 * Centralise les appels à la base de donnée utiles pour la connexion
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Modele/Modele.php';

class ModeleConnexion extends Modele {

    /**
     * Récupération du username
     * 
     * @param $id : id de l'utilisateur à cibler
     * @return le PDO statment contenant le résultat de la requete
     */
    public function getUsername($id){
        $result = $this->executerRequete("SELECT username FROM logins WHERE customer_id=:id", array("id" => $id));
        return $result;
    }

    /**
     * Récupération de l'utilisateur avec ses information de connexion
     * (permet de verifier les informations de connexion)
     * 
     * @param $uname : username de l'utilisateur à cibler
     * @param $psw : mot de passe à verifier
     * @return le PDO statment contenant le résultat de la requete
     */
    public function getLogin($uname, $psw){
        return $this->executerRequete("SELECT * FROM logins WHERE username=:uname and password=SHA1(:psw)", array("uname" => $uname, "psw" => $psw));
    }

    /**
     * Récupération de l'admin avec ses information de connexion
     * (permet de verifier les informations de connexion)
     * 
     * @param $uname : username de l'admin à cibler
     * @param $psw : mot de passe à verifier
     * @return le PDO statment contenant le résultat de la requete
     */
    public function getLoginAdmin($uname, $psw){
        return $this->executerRequete("SELECT id FROM admin WHERE username=:uname and password=:psw", array("uname" => $uname, "psw" => $psw));
    }

    /**
     * Permet de créer un nouvel utilisateur
     * 
     * @param $uname : username de l'utilisateur
     * @param $psw : mot de passe à ajouter
     * @param $prenom : prénom
     * @param $nom : nom de famille
     * @return l'id du nouvel utilisateur inséré
     */
    public function CreateCustomer($uname, $psw, $prenom, $nom){
        // creation du customer :
        $this->executerRequete("INSERT INTO customers (forname, surname, registered) VALUES (:prenom, :nom, 1);"
        , array("prenom" => $prenom, "nom" => $nom));

        $cust_id = $this->getLastId();

        // creation du login :
        $this->executerRequete("INSERT INTO logins (customer_id, username, password) VALUES ($cust_id, :uname, SHA1(:psw));"
        , array("uname" => $uname, "psw" => $psw));

        return $cust_id;
    }

    /**
     * Vérifie l'existance d'un username
     * 
     * @param $uname : username à tester
     * @return true s'il existe, sinon false
     */
    public function UserExist($uname){
        $result = $this->executerRequete("SELECT id FROM logins WHERE username=:uname", array("uname" => $uname));
        return count($result->fetchAll()) != 0;
    }

}