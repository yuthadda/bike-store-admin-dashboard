<?php

    include_once "../includes/db.php";
    Class Store{

        public $name,$phone,$email,$street,$city,$state,$zipcode;

        public $con;

        public function __construct()
        {
            $this->name = "default";
            $this->phone = "default";
            $this->email = "default";
            $this->street = "default";
            $this->city = "default";
            $this->state = "default";
            $this->zipcode = "default";
        }

        public function insertStore($name,$phone,$email,$street,$city,$state,$zipcode)
        {
            $this->con = Database::connect();
            if($this->con)
            {
                $sql = "insert into stores(store_name, phone, email, street, city, state, zip_code)
                 values (:name,:phone,:email,:street,:city,:state,:zip_code)";

                 $statement = $this->con->prepare($sql);
                 $statement->bindParam(":name",$name);
                 $statement->bindParam(":phone",$phone);
                 $statement->bindParam(":email",$email);
                 $statement->bindParam(":street",$street);
                 $statement->bindParam(":city",$city);
                 $statement->bindParam(":state",$state);
                 $statement->bindParam(":zip_code",$zipcode);

                 $result=$statement->execute();
                 return $result;
            }
        }

        public function getAllStores()
        {
            $this->con=Database::connect();
            $sql = "select * from stores where deleted_at is null";
            $statement=$this->con->prepare($sql);
            $result=$statement->execute();
            if($result)
            return $statement->fetchAll();
        return null;
        }

        public function getStoreByID($id)
        {
            $this->con=Database::connect();
            $sql = "select * from stores where  store_id=:id";
            $statement=$this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result=$statement->execute();
            if($result)
            return $statement->fetch();
        return null;
        }

        public function UpdateStore($id,$name,$phone,$email,$street,$city,$state,$zipcode)
        {
            $this->con = Database::connect();
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "update stores set store_name=:name, phone=:phone, email=:email, street=:street, city=:city,state=:state, zip_code=:zipcode where store_id=:id";
            $statement  =$this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":street",$street);
            $statement->bindParam(":city",$city);
            $statement->bindParam(":state",$state);
            $statement->bindParam(":zipcode",$zipcode);
            $result=$statement->execute();
        return $result;
        }

        public function deleteStore($id)
        {
            $today      = new DateTime();
            $stringDate = $today->format('Y-m-d H:i:s');
            $this->con  = Database::connect();
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql    = "update stores set deleted_at=:date where store_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":date",$stringDate);
            $result = $statement->execute();
            return $result;

        }

        function searchStore($data)
        {
            $this->con=Database::connect();
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "select * from stores where (store_name like :data or phone like :data or email like :data or street like :data or city like :data or state like :data or zip_code like :data) and (deleted_at is null)";
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
    }

?>
