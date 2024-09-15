<?php
include_once('../includes/db.php');

class Order{
    public $con;
    public function getOrders(){
        $this->con = Database::connect();
        $sql = "select orders.*,customers.first_name as cfn,customers.last_name as cln,stores.store_name as sname,staffs.first_name as sfn,staffs.last_name as sln
        from orders join customers join stores join staffs
        where orders.customer_id=customers.customer_id
        and orders.store_id = stores.store_id
        and orders.staff_id = staffs.staff_id
        order by orders.order_date desc ;
        ";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }

    public function getFullOrder($id){
        $this->con = Database::connect();
        $sql = "select orders.*,customers.*,stores.store_name as sname
        from orders join customers join stores
        where orders.order_id=:id
        and orders.customer_id = customers.customer_id
        and orders.store_id = stores.store_id
        ";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }

    public function getOrderById($id){
        $this->con = Database::connect();
        $sql = "select orders.*,customers.first_name as cfn,customers.last_name as cln,stores.store_name as sname,staffs.first_name as sfn,staffs.last_name as sln
        from orders join customers join stores join staffs
        where orders.order_id = :id
        and orders.customer_id=customers.customer_id
        and orders.store_id = stores.store_id
        and orders.staff_id = staffs.staff_id;
        ";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }

    public function getOrderItems($id){
        $this->con = Database::connect();
        $sql = "select order_items.*,products.product_name as pname
        from order_items join products
        where order_items.order_id = :id
        and order_items.product_id = products.product_id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }


    public function addOrder($cid,$sid,$staffid,$order_date,$required_date,$products){
        $this->con = Database::connect();
        $sql = "insert into orders (customer_id,order_date,required_date,store_id,staff_id)
        values (:cid,:order_date,:required_date,:sid,:staffid)
        ";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":cid",$cid);
        $statement->bindParam(":order_date",$order_date);
        $statement->bindParam(":required_date",$required_date);
        $statement->bindParam(":sid",$sid);
        $statement->bindParam(":staffid",$staffid);
        $result = $statement->execute();
        if($result){
            $sql = "select max(order_id) as id from orders ";
            $statement = $this->con->prepare($sql);
            $result1 = $statement->execute();
            if($result1){
                $order = $statement->fetch();
                $order_id = $order['id'];
                $sql = "insert into order_items(order_id,product_id,quantity,list_price,discount)
                values (:id,:pid,:qty,:price,:dis)";

                for($count=0;$count<count($products);$count++)
                {
                    // $item = $count+1;
                    $statement = $this->con->prepare($sql);
                    $statement->bindParam(":id",$order_id);
                    // $statement->bindParam(":sid",$sid);
                    $statement->bindParam(":pid",$products[$count][0]);
                    $statement->bindParam(":price",$products[$count][1]);
                    $statement->bindParam(":qty",$products[$count][2]);
                    $statement->bindParam(":dis",$products[$count][3]);
                    $result2 = $statement->execute();
                    if(!$result2){
                        return false;
                    }
                }
            }else{
                return false;
            }
            return true;
        }else{
            return false;
        }
    }


}
?>
