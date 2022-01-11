<?php
require_once './Modele/Modele.php';
class ModelePanier extends Modele {

    public function GetPanierWithUserId($id){
        $sql = "SELECT p.name, p.description, p.image, p.price, o.quantity 
        FROM orderitems o, products p 
        WHERE o.order_id=(SELECT id FROM orders WHERE status=0 AND customer_id=:id) AND o.product_id = p.id;";
        $result = $this->executerRequete($sql, array("id"=>$id));
        return $result;
    }

}