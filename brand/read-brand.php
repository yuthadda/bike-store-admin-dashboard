<?php

include_once("../layout/navbar.php");
include_once("../controllers/brand-controller.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $brandController = new BrandController();
    $brand = $brandController->getBrandById($id);
}

?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                            Brand Information
                            <div class="col-md-6">
                                <h2>Brand Id: <?php echo $brand['brand_id'] ?></h2>
                                <h2>Brand Name: <?php echo $brand['brand_name'] ?></h2>
                            </div>
                        </div>

                     </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


