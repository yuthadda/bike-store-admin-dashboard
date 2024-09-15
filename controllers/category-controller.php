<?php
include_once("../models/category.php");
class categoryController{

    function addCaterory($name){
        $category = new Category();
        $result=$category->insertCategory($name);
        return $result;
    }

    function getAllCategory(){
        $category = new Category();
        $result = $category->selectAllCategories();
        return $result;
    }

    function getCategoryById($id){
        $category = new Category();
        $result = $category->selectCategoryById($id);
        return $result;
    }

    function updateCategory($id,$name){
        $category = new Category();
        $result = $category->updateCategory($id,$name);
        return $result;
    }

    function deleteCategory($id){
        $category = new Category();
        $result = $category->deleteCategory($id);
        return $result;
    }

    function deleteCategoryAjax($id){
        $category = new Category();
        $result = $category->deleteCategoryAjax($id);
        return $result;
    }

    function searchCategory($data){
        $category = new Category();
        $result = $category->searchCategoryByData($data);
        return $result;
    }

}


?>
