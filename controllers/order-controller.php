<?php
include_once("../models/order.php");

class Order_controller{
    function getOrders(){
        $order = new Order();
        $result = $order->getOrders();
        return $result;
    }
    function getOrderById($id){
        $order = new Order();
        $result = $order->getOrderById($id);
        return $result;
    }

    function getOrderItems($id){
        $order = new Order();
        return $order->getOrderItems($id);
    }

    function addOrder($cid,$sid,$staffid,$order_date,$required_date,$products){
        $order = new Order();
        return $order->addOrder($cid,$sid,$staffid,$order_date,$required_date,$products);
    }

    function getFullOrder($id){
        $order = new Order();
        return $order->getFullOrder($id);
    }
}
?>
