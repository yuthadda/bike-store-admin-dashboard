<?php

include_once ('../layout/navbar.php');

include_once ("../controllers/store-controller.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $storeController = new StoreController();
    $store = $storeController->getStoreById($id);
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
                            Store Information

                            <div class="col-md-2">
                                <h5>Store Name:<?php echo $store['store_name'] ?></h5>
                            </div>
                        </div>



                    </div>
                </main>
<?php
include_once("../layout/footer.php");
?>
