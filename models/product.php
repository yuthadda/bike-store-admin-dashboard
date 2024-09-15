<?php

include_once("../includes/db.php");

class Product{
    public $name,$brand_id,$year,$price;
    public $con;

    public function insertProduct($name,$brand_id,$category_id,$year,$price){
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into products(product_name,brand_id,category_id,model_year,list_price) values(:name,:brandid,:categoryid,:year,:price)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":brandid",$brand_id);
            $statement->bindParam(":categoryid",$category_id);
            $statement->bindParam(":year",$year);
            $statement->bindParam(":price",$price);
            $result = $statement->execute();
            return $result;
        }
    }

    public function selectAllProducts(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from products where deleted_at is null";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result){
                return $statement->fetchAll();
            }else{
                return null;
            }
        }
    }

    public function selectProductById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from products where product_id = :id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result){
                return $statement->fetch();
            }else{
                return null;
            }
        }
    }

    public function updateProductById($id,$name,$brand_id,$category_id,$model_year,$list_price){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update products set product_name = :name,brand_id= :brandId , category_id = :categoryId, model_year= :model, list_price= :price where product_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":brandId",$brand_id);
            $statement->bindParam(":categoryId",$category_id);
            $statement->bindParam(":model",$model_year);
            $statement->bindParam(":price",$list_price);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deleteProductById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "delete from products where product_id = :id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deleteProductByIdAjax($id){
        $date = new DateTime();
        $strDate = $date->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        $sql = "update products set deleted_at = :date where product_id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":date",$strDate);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        return $result;
    }

    public function searchProductByData($data){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from products where product_name like :data or brand_id like :data or category_id like :data or model_year like :data or list_price like :data and deleted_at is null ";
            $statement = $this->con->prepare($sql);
            $search_data = "%".$data."%";
            $statement->bindParam(":data",$search_data);
            $result = $statement->execute();
            if($result){
                return $statement->fetchAll();
            }else{
                return null;
            }
    }
    }

}

?>
