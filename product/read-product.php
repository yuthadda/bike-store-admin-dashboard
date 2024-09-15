<?php

include_once("../layout/navbar.php");
include_once("../controllers/product-controller.php");

$id = $_GET['id'];
$productController = new productController();
$product = $productController->getProductById($id);


?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <h3>Product Name : <?php echo  $product['product_name'] ; ?></h3>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>



