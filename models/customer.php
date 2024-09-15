<?php

include_once("../includes/db.php");

class Customer{

    public $con;
    public function insertCustomer($first,$last,$phone,$email,$street,$city,$state,$zipcode){
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into customers(first_name,last_name,phone,email,street,city,state,zip_code) values (:first,:last,:phone,:email,:street,:city,:state,:zipcode)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":first",$first);
            $statement->bindParam(":last",$last);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":street",$street);
            $statement->bindParam(":city",$city);
            $statement->bindParam(":state",$state);
            $statement->bindParam(":zipcode",$zipcode);
            $result = $statement->execute();
            return $result;
        }
    }

    public function selectAllCustomers(){
        $this->con = Database::connect();
        $sql = "select * from customers where deleted_at is null";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else {
            return null;
        }
    }

    public function selectCustomerById($id){
        $this->con = Database::connect();
        $sql = "select * from customers where customer_id=:id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }

    public function updateCustomerById($id,$first,$last,$phone,$email,$street,$city,$state,$zipcode){
        $this->con = Database::connect();
        $sql = "update customers set first_name=:first,last_name=:last,phone=:phone,email=:email,street=:street,city=:city,state=:state,zip_code=:zipcode where  customer_id=:id ";;
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":first",$first);
        $statement->bindParam(":last",$last);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":street",$street);
        $statement->bindParam(":city",$city);
        $statement->bindParam(":state",$state);
        $statement->bindParam(":zipcode",$zipcode);
        $result = $statement->execute();
        return $result;

    }

    public function deleteCustomerById($id){
        $this->con = Database::connect();
        $sql = "delete from customers where customer_id=:id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        return $result;
    }

    public function deleteCustomerByAjax($id){
        $today = new DateTime();
        $strDate = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        $sql = "update customers set deleted_at = :date where customer_id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":date",$strDate);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        return $result;
    }

    public function searchCustomerByAjax($data){
        $this->con = Database::connect();
        $sql = "select * from customers where (first_name like :data or last_name like :data or phone like :data or email like :data or street like :data or city like :data or state like :data or zip_code like :data) and (deleted_at is null) ";
        $statement=$this->con->prepare($sql);
        $search_data="%".$data."%";
        $statement->bindParam(":data",$search_data);
        $result=$statement->execute();
        if($result)
        {
            return $statement->fetchAll();
        }

        else
        {
            return null;
        }
    }

    public function getCustomerByState(){
        $this->con = Database::connect();
        $sql = "select state,count(*) as numCus from customers group by state ";
        $statement=$this->con->prepare($sql);
        if($statement->execute()){
            $result = $statement->fetchAll();
            return $result;
        }else{
            return null;
        }
    }
}

?>


