<?php

    include_once ("../controllers/store-controller.php");
    $id=$_POST['id'];



    $storeController = new StoreController();
    $result=$storeController->deleteStore($id);

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
