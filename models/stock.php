<?php

include_once("../includes/db.php");

class Stock{
    private $con;
    public function getStocksByStore($store_id){
        $this->con = Database::connect();
        $sql = "select stocks.*,products.product_name as pname,products.list_price as price
        from stocks join products
        where stocks.store_id = :id
        and stocks.product_id = products.product_id
        and stocks.quantity > 0";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$store_id);
        $result = $statement->execute();
        echo $result;
        if($result){
            return $statement->fetchAll();

        }else{
            return null;

    }
}
}




?>
