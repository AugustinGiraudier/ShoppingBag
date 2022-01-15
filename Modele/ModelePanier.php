<?php
require_once './Modele/Modele.php';
class ModelePanier extends Modele {

    public function GetPanierWithUserId($id){
        $sql1 = "SELECT id, status FROM orders WHERE (status=0 or status=1) AND customer_id=:id";
        $result1 = $this->executerRequete($sql1, array("id"=>$id))->fetchAll();
        $orderID = null;
        $status = null;
        if(isset($result1[0])){
            $orderID = $result1[0]['id'];
            $status = $result1[0]['status'];
        }
        $sql = "SELECT p.id, p.name, p.description, p.image, p.price, o.quantity 
        FROM orderitems o, products p 
        WHERE o.order_id=:oId AND o.product_id = p.id;";
        $result = $this->executerRequete($sql, array("oId"=>$orderID));
        return array('result' =>$result, "orderID" => $orderID, 'orderStatus'=>$status);
    }
    public function GetPanierWithSessionId($sessionID){
        $sql1 = "SELECT id, status FROM orders WHERE (status=0 or status=1) AND session=:id";
        $result1 = $this->executerRequete($sql1, array("id"=>$sessionID))->fetchAll();
        $orderID = null;
        $status = null;
        if(isset($result1[0])){
            $orderID = $result1[0]['id'];
            $status = $result1[0]['status'];
        }
        $sql = "SELECT p.id, p.name, p.description, p.image, p.price, o.quantity 
        FROM orderitems o, products p 
        WHERE o.order_id=:oId AND o.product_id = p.id;";
        $result = $this->executerRequete($sql, array("oId"=>$orderID));
        return array('result' =>$result, "orderID" => $orderID, 'orderStatus'=>$status);
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
        $sql="SELECT id, status FROM orders where customer_id=:uID and (status=0 or status=1)";
        $result = $this->executerRequete($sql, array("uID"=>$userID));
        return $result;
    }
    public function getSessionOrderID($sessionID){
        $sql="SELECT id, status FROM orders where session=:sID and (status=0 or status=1)";
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
        $this->executerRequete($sql, array("id"=>$orderID));
        $sql2="DELETE FROM orderitems where order_id=:id";
        $this->executerRequete($sql2, array("id"=>$orderID));
    }
    
    public function sendOrder($orderID){
        $sql="UPDATE orders
        SET status = 10
        WHERE id=:id";
        return $this->executerRequete($sql, array("id"=>$orderID));
    }
    
    public function addAdress($orderID, $prenom, $nom, $add, $city, $pcode, $phone, $email){
        $sql="INSERT INTO delivery_addresses (firstname, lastname, add1, city, postcode, phone, email) values (:prenom,:nom,:add,:city,:pcode,:phone,:email);";
        $this->executerRequete($sql, array("prenom"=>$prenom, "nom" => $nom, "add"=>$add, "city"=>$city, "pcode"=>$pcode, "phone"=>$phone, "email"=>$email));
        $add_id = $this->getLastId();
        $sql2 = "UPDATE orders SET delivery_add_id = :add_id, status = 1 WHERE id=:oID";
        $this->executerRequete($sql2, array("add_id"=>$add_id, "oID"=>$orderID));
    }
    
    public function setPaiement($paiement, $orderID, $statusNumber){
        $sql = "UPDATE orders SET payment_type=:pay, status=:stat where id=:oID";
        $this->executerRequete($sql, array("stat"=>$statusNumber, "oID"=>$orderID, "pay"=>$paiement));
    }

    public function removeStocksOfOrder($orderID){
        $sql="SELECT p.name, o.product_id, o.quantity from orderitems o, products p where p.id=o.product_id and order_id=:oID";
        $result = $this->executerRequete($sql, array("oID"=>$orderID))->fetchAll();

        $sql2="SELECT quantity from products where id=:pID";
        foreach($result as $product){
            $res = $this->executerRequete($sql2, array("pID"=>$product['product_id']))->fetchAll()[0];
            if(intval($res['quantity']) < intval($product['quantity'])){
                return $product['name'];
            }
        }

        $sql3 = "UPDATE products SET quantity=(select quantity from products where id=:pID)-:quantity WHERE id=:pID";
        foreach($result as $product){
            $this->executerRequete($sql3, array("pID"=>$product['product_id'], "quantity"=>$product['quantity']));
        }
        return false;
    }
}