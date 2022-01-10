<?php
require_once '../Modele/Modele.php';
class ModeleConnexion extends Modele {

    // public function getUser($id){
    //     $result = $this->executerRequete("SELECT * FROM customers WHERE id=:id", array("id" => $id));
    //     return $result;
    // }

    public function getLogin($uname, $psw){
        return $this->executerRequete("SELECT * FROM logins WHERE username=:uname and password=SHA1(:psw)", array("uname" => $uname, "psw" => $psw));
    }

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

    public function UserExist($uname){
        $result = $this->executerRequete("SELECT id FROM logins WHERE username=:uname", array("uname" => $uname));
        if(count($result->fetchAll()) == 0){
            return false;
        }
        return true;
    }

}