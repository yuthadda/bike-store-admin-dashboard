<?php

include_once("../controllers/customer-controller.php");
$id =$_POST['id'];


$customerController = new CustomerController();
$result = $customerController->deleteCustomerAjax($id);

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
