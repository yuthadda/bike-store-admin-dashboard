<?php
include_once('../includes/db.php');
class Category{
    // public $name;
    public $con;

    public function insertCategory($name){
        $this->con=Database::connect();
        if($this->con){
            $sql = "insert into categories(category_name) values (:name)";
            $statement = $this->con->prepare($sql); //sql statement
            $statement->bindParam(":name",$name); //binding parameter
            //execute
            $result = $statement->execute(); //true or false
            return $result;
        }
    }

    public function selectAllCategories(){
        $this->con = Database::connect();
        $sql = "select * from categories where deleted_at is NULL";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }

    public function selectCategoryById($id){
        $this->con = Database::connect();
        $sql = "select * from categories where category_id= :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }

    public function updateCategory($id,$name){
        $this->con = Database::connect();
        $sql = "update categories set category_name = :name where category_id= :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindParam(":name",$name);
        $result = $statement->execute();
        return $result;
    }

    public function deleteCategory($id){
        $this->con = Database::connect();
        $sql = "delete from categories where category_id= :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        return $result;
    }

    public function deleteCategoryAjax($id){
        $today = new DateTime();
        $strDate = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        $sql = "update categories set deleted_at = :date where category_id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":date",$strDate);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        return $result;
    }

    public function searchCategoryByData($data){
        $this->con = Database::connect();
        $sql = "select * from categories where category_name like :data and deleted_at is null";
        $search_data = "%".$data."%";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":data",$search_data);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }



}

?>
