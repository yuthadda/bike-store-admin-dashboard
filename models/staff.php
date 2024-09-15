<?php

include_once "../includes/db.php";

Class Staff{

    public $con;
    public function getStaffByProductId($id){
        $this->con = Database::connect();
        $sql = "select * from staffs where store_id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$id);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }
}

?>
