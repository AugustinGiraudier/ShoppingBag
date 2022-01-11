<?php
require_once './Modele/Modele.php';
class ModelePanier extends Modele {

    public function GetPanierWithUserId($id){
        $sql1 = "SELECT id FROM orders WHERE status=0 AND customer_id=:id";
        $orderID = $this->executerRequete($sql1, array("id"=>$id))->fetchAll()[0]['id'];
        $sql = "SELECT p.id, p.name, p.description, p.image, p.price, o.quantity 
        FROM orderitems o, products p 
        WHERE o.order_id=:oId AND o.product_id = p.id;";
        $result = $this->executerRequete($sql, array("oId"=>$orderID));
        return array('result' =>$result, "orderID" => $orderID);
    }
    
    public function GetCustomerID($OrderID){
        $sql = "SELECT customer_id from orders where id=:orderid and status=0";
        $result = $this->executerRequete($sql, array("orderid"=>$OrderID))->fetchAll()[0]['customer_id'];
        return $result;
    }
    
    public function deleteItem($orderID, $ItemID){
        $sql = "DELETE FROM orderitems where order_id=:order and product_id=:product";
        $this->executerRequete($sql, array("order"=>$orderID, "product"=>$ItemID));
    }

}