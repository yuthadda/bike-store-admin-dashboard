<?php

include_once '../controllers/stock-controller.php';

$stockController = new StockController();
$products = $stockController->getStocksByStore($_POST['id']);

$output = "";
$output .= "<option>Choose product</option>";
foreach($products as $product){
    $output .="<option value = ".$product['product_id'].">".$product['pname']."</option>";
}

echo $output;
?>
