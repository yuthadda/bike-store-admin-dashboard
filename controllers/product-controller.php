<?php

include_once("../models/product.php");

class productController{

    function addProduct($name,$brand_id,$category_id,$year,$price){
        $product = new Product();
        $result = $product->insertProduct($name,$brand_id,$category_id,$year,$price);
        return $result;
    }

    function getAllProduct(){
        $product = new Product();
        $result = $product->selectAllProducts();
        return $result;
    }

    function getProductById($id){
        $product = new Product();
        $result = $product->selectProductById($id);
        return $result;
    }

    function updateProduct($id,$name,$brand_id,$category_id,$model_year,$list_price){
        $product = new Product();
        $result = $product->updateProductById($id,$name,$brand_id,$category_id,$model_year,$list_price);
        return $result;
    }

    function deleteProduct($id){
        $product = new Product();
        $result = $product->deleteProductById($id);
        return $result;
    }

    function deleteProductAjax($id){
        $product = new Product();
        $result = $product->deleteProductByIdAjax($id);
        return $result;
    }

    function searchProduct($data){
        $product = new Product();
        $result = $product->searchProductByData($data);
        return $result;
    }
}


?>
