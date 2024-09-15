<?php
include_once('../includes/db.php');
class Brand{
    public $name;
    public $con;
    public function __construct(){
        $this->name = 'default';
    }

    public function insertBrand($name){
        $this->con=Database::connect();
        if($this->con){
            $sql = "insert into brands(brand_name) values (:name)";
            $statement = $this->con->prepare($sql); //sql statement
            $statement->bindParam(":name",$name); //binding parameter
            //execute
            $result = $statement->execute(); //true or false
            return $result;
        }
    }

    public function getAllBrand(){
        $this->con = Database::connect();
        $sql = "select * from brands where deleted_at is NULL";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }

    }

    public function getBrandById($id){
        $this->con= Database::connect();
        $sql = "select * from brands where brand_id= :id";
        $statement = $this->con->prepare($sql);
        $statement ->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }

    public function updateBrand($id,$name){
        $this->con= Database::connect();
        $sql = "update brands set brand_name=:name where brand_id=:id";
        $statement = $this->con->prepare($sql);
        $statement ->bindParam(":id",$id);
        $statement ->bindParam(":name",$name);
        $result = $statement->execute();
        return $result;

    }

    public function deleteBrand($id){
        $today = new DateTime();
        $strDate = $today->format('Y-m-d H:i:s');
        $this->con= Database::connect();
        // $sql = "delete from brands where brand_id=:id";
        $sql = 'update brands set deleted_at=:date where brand_id=:id';
        $statement = $this->con->prepare($sql);
        $statement ->bindParam(":id",$id);
        $statement ->bindParam(":date",$strDate);
        $result = $statement->execute();
        return $result;
    }


    function search($data){
        $this->con= Database::connect();
        $sql = "select * from brands where brand_name like :data and deleted_at is NULL";
        $statement = $this->con->prepare($sql);
        $search_data = "%".$data."%";
        $statement ->bindParam(":data",$search_data);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }

    }

}

?>
