<?php

include_once("../layout/navbar.php");
include_once("../controllers/customer-controller.php");
$id = $_GET['id'];

$customerController = new CustomerController();
$customer = $customerController->getCustomerById($id);

?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            <h2>Customer Name: <?php echo $customer['first_name']." ".$customer['last_name']  ?></h2>
                        </div>

                     </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


