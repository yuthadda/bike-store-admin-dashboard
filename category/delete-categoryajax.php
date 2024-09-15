<?php

include_once("../controllers/category-controller.php");
$id = $_POST['id'];

$categoryController = new categoryController();
$result = $categoryController->deleteCategoryAjax($id);


if($result){
    // echo "success"; //string
    $data = array(
        "status"=>"true"
    );
    echo json_encode($data);
}else{
    // echo "fail";
    $data = array(
        "status"=>"false"
    );
    echo json_encode($data);
}

?>
