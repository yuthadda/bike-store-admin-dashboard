<?php

include_once("../controllers/product-controller.php");

$data = $_POST['value'];


$productController = new productController();
$products = $productController->searchProduct($data);

$output = "";
$count = 1;

foreach($products as $product){
    $output .="
    <tr>
    <td>" . $count++ . "</td>
    <td>" . $product['product_name'] . "</td>
    <td>" . $product['brand_id'] . "</td>
    <td>" . $product['category_id'] . "</td>
    <td>" . $product['model_year'] . "</td>
    <td>" . $product['list_price'] . "</td>
    <td><a href='read-product.php?id=" . $product['product_id'] . "' class='btn btn-success mx-1'>Read</a><a href='edit-product.php?id=" . $product['product_id'] . "' class='btn btn-info mx-1'>Edit</a><a href='delete-product.php?id=" . $product['product_id'] . "' class='btn btn-danger mx-1'>Delete</a><a class='btn btn-dark mx-1 btnDeleteProduct'>Delete Ajax</a></td>
    </tr>
    ";

}
echo $output;

?>
