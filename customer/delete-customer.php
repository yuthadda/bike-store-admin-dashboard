<?php

include_once("../controllers/customer-controller.php");
$id = $_GET['id'];

$customerController = new CustomerController();
$result = $customerController->deleteCustomer($id);
if($result){
    header("location:customers.php?msg=deletesuccess");
}else{
    header("location:customers.php?msg=deletefail");
}

?>
