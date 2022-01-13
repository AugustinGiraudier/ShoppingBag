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
    public function GetPanierWithSessionId($sessionID){
        $sql1 = "SELECT id FROM orders WHERE status=0 AND session=:id";
        $orderID = $this->executerRequete($sql1, array("id"=>$sessionID))->fetchAll()[0]['id'];
        $sql = "SELECT p.id, p.name, p.description, p.image, p.price, o.quantity 
        FROM orderitems o, products p 
        WHERE o.order_id=:oId AND o.product_id = p.id;";
        $result = $this->executerRequete($sql, array("oId"=>$orderID));
        return array('result' =>$result, "orderID" => $orderID);
    }
    
    public function GetCustomerID($OrderID){
        $sql = "SELECT customer_id from orders where id=:orderid and status=0";
        $result = $this->executerRequete($sql, array("orderid"=>$OrderID));
        return $result;
    }
    public function GetSessionID($OrderID){
        $sql = "SELECT session from orders where id=:orderid and status=0";
        $result = $this->executerRequete($sql, array("orderid"=>$OrderID));
        return $result;
    }
    
    public function deleteItem($orderID, $ItemID){
        $sql = "DELETE FROM orderitems where order_id=:order and product_id=:product";
        $this->executerRequete($sql, array("order"=>$orderID, "product"=>$ItemID));
    }
    
    public function getStock($productID){
        $sql = "SELECT quantity FROM products where id=:id";
        $result = $this->executerRequete($sql, array("id"=>$productID));
        return $result;
    }
    
    public function getOrderId($userID){
        $sql="SELECT id FROM orders where customer_id=:uID and status=0";
        $result = $this->executerRequete($sql, array("uID"=>$userID));
        return $result;
    }
    public function getSessionOrderID($sessionID){
        $sql="SELECT id FROM orders where session=:sID and status=0";
        $result = $this->executerRequete($sql, array("sID"=>$sessionID));
        return $result;
    }
    
    public function creatOrder($userID){
        $sql="INSERT INTO orders (customer_id, date, status) VALUES (:uID, DATE(NOW()), 0)";
        $this->executerRequete($sql, array("uID"=>$userID));
        return $this->getLastId();
    }
    public function creatSessionOrder($sessionID){
        $sql="INSERT INTO orders (customer_id, session, date, status) VALUES (-1, :sID, DATE(NOW()), 0)";
        $this->executerRequete($sql, array("sID"=>$sessionID));
        return $this->getLastId();
    }
    
    public function addProductToOrder($OrderID, $ProductID, $Quantity){
        $sql1 = "SELECT id from orderitems where order_id=:oID and product_id=:pID";
        $result = $this->executerRequete($sql1, array("oID"=>$OrderID, "pID"=>$ProductID))->fetchAll();
        if(count($result) == 0){
            $sql="INSERT INTO orderitems (order_id, product_id, quantity) VALUES (:oID, :pID, :q)";
            $this->executerRequete($sql, array("oID"=>$OrderID, "pID"=>$ProductID, "q"=>$Quantity));
            return;
        }
        $id = $result[0]['id'];
        $sql="UPDATE orderitems SET quantity=(Select quantity from orderitems where id=:id)+:q where id=:id";
        $this->executerRequete($sql, array("id"=>$id, "q"=>$Quantity));
    }
    
    public function getOrders(){
        $sql = "SELECT o.id, o.payment_type, o.date, o.status, d.firstname, d.lastname, d.add1, d.city, d.email 
        FROM orders o
        left outer join delivery_addresses d on o.delivery_add_id=d.id
        where o.status!=0";
        $result = $this->executerRequete($sql);
        return $result;
    }
    
    public function deleteOrder($orderID){
        $sql="DELETE FROM orders where id=:id";
        return $this->executerRequete($sql, array("id"=>$orderID));
    }
    
    public function sendOrder($orderID){
        $sql="UPDATE orders
        SET status = 10
        WHERE id=:id";
        return $this->executerRequete($sql, array("id"=>$orderID));
    }
}