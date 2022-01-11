<?php
require_once './Modele/Modele.php';

class ModeleProduit extends Modele {



    public function getPrice($id){
        $result = $this->executerRequete("SELECT price FROM products WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getName($id){
        $result = $this->executerRequete("SELECT name FROM products WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getDescription($id){
        $result = $this->executerRequete("SELECT description FROM products WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getQuantity($id){
        $result = $this->executerRequete("SELECT quantity FROM products WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getImage($id){
        $result = $this->executerRequete("SELECT image FROM products WHERE id=:id", array("id" => $id));
        return $result;
    }

    public function getCategorie($id){
        $result = $this->executerRequete("SELECT * FROM products WHERE cat_id=:id", array("id" => $id));
        return $result;
    }
}