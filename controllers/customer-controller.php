<?php
include_once("../models/customer.php");

class CustomerController{
    function addCustomer($first,$last,$phone,$email,$street,$city,$state,$zipcode){
        $customer = new Customer();
        $result = $customer->insertCustomer($first,$last,$phone,$email,$street,$city,$state,$zipcode);
        return $result;
    }
    function getCustomers(){
        $customer = new Customer();
        $result = $customer->selectAllCustomers();
        return $result;
    }

    function getCustomerById($id){
        $customer = new Customer();
        $result = $customer->selectCustomerById($id);
        return $result;
    }

    function updateCustomer($id,$first,$last,$phone,$email,$street,$city,$state,$zipcode){
        $customer = new Customer();
        $result = $customer->updateCustomerById($id,$first,$last,$phone,$email,$street,$city,$state,$zipcode);
        return $result;
    }

    function deleteCustomer($id){
        $customer = new Customer();
        $result = $customer->deleteCustomerById($id);
        return $result;
    }

    function deleteCustomerAjax($id){
        $customer = new Customer();
        $result = $customer->deleteCustomerByAjax($id);
        return $result;
    }

    function searchCustomer($data){
        $customer = new Customer();
        $result = $customer->searchCustomerByAjax($data);
        return $result;
    }

    function getCustomerByState(){
        $customer = new Customer();
        $result = $customer->getCustomerByState();
        return $result;
    }


}


?>
