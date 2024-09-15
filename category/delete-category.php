<?php

include_once("../controllers/category-controller.php");

$id = $_GET['id'];

$categoryController = new categoryController();
$result = $categoryController->deleteCategory($id);
if($result){
    header("location:categories.php?msg=deletesuccess");
}else{
    header("location:categories.php?msg=deletefail");
}

?>
