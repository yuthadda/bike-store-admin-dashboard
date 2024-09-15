<?php

include_once "../models/staff.php";

Class StaffController{

    function getStaffByProductId($id){
        $staff = new Staff();
        return $staff->getStaffByProductId($id);
    }
}

?>
