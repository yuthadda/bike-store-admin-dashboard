<?php
include_once("../controllers/customer-controller.php");
$data = $_POST['value'];
$customerController = new CustomerController();
$customers = $customerController->searchCustomer($data);
$count = 1;
$output = "";

foreach($customers as $customer){
    $output .= "
            <tr id=".$customer['customer_id'].">
            <td>".$count++."</td>
            <td>".$customer['first_name']."</td>
            <td>".$customer['last_name']."</td>
            <td>".$customer['phone']."</td>
            <td>".$customer['email']."</td>
            <td><a href='read-customer.php?id=".$customer['customer_id']."' class='btn btn-success mx-1'>Read</a><a href='edit-customer.php?id=".$customer['customer_id']."' class='btn btn-warning mx-1'>Eidt</a><a href='delete-customer.php?id=".$customer['customer_id']."' class='btn btn-danger mx-1'>Delete</a><a class='btn btn-dark mx-1 btnDeleteCustomer'>Delete Ajax</a></td>
            </tr>
    ";
}
echo $output;
?>
