<?php

include_once("../controllers/product-controller.php");
$id = $_GET['id'];

$productController = new productController();
$result = $productController->deleteProduct($id);
if($result){
    header("location:products.php?msg=deletesuccess");
}else{
    header("location:products.php?msg=deletefail");
}
?>
