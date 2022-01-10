<?php
require_once '../Modele/Modele.php';
class ModeleConnexion extends Modele {

    public function getUser($id){
        $result = $this->executerRequete("SELECT * FROM customers WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getLogin($uname, $psw){
        return $this->executerRequete("SELECT * FROM logins WHERE username=:uname and password=SHA1(:psw)", array("uname" => $uname, "psw" => $psw));
    }

}