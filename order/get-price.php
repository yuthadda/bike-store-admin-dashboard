<?php

include_once '../controllers/product-controller.php';
$productController = new productController();
$product = $productController->getProductById($_POST['id']);

echo $product['list_price'];


?>
