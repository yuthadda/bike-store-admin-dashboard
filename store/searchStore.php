<?php

    include_once ("../controllers/store-controller.php");

    $data = $_POST['value'];
    $storeController = new StoreController();
    $stores = $storeController->searchStore($data);

    $output="";
    $count=1;

    foreach($stores as $store)
    {
        $output .= "<tr>";
        $output .= "<td>".$count++."</td>";
        $output .= "<td>".$store['store_name']."</td>";
        $output .= "<td>".$store['phone']."</td>";
        $output .= "<td>".$store['email']."</td>";
        $output .= "<td>".$store['street']."</td>";
        $output .= "<td>".$store['city']."</td>";
        $output .= "<td>".$store['state']."</td>";
        $output .= "<td>".$store['zip_code']."</td>";
        $output .= "<td> <a class='btn btn-info mx-2' href='read-brand.php?id=".$store['store_id']."'>Read</a> <a class='btn btn-warning mx-2' href='edit-brand.php?id=".$store['store_id']."'>Edit</a>
            <button class='btn btn-dark btnStoreDelete' >Delete</button>"."</td>";
        $output .= "</tr>";
    }
    echo $output;

?>
