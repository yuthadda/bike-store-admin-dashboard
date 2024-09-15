<?php

include_once "../controllers/staff-controller.php";

$id = $_POST['id'];

$staffController = new StaffController();
$staffs = $staffController->getStaffByProductId($id);

$output = "";
$output .= "<option>Choose Staff</option>";
foreach($staffs as $staff){
    $output .= "<option value=" . $staff['staff_id'] . ">".$staff['first_name']." ".$staff['last_name']. "</option>";
}
echo $output;

?>
