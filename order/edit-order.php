<?php
include_once("../layout/navbar.php");
include_once("../controllers/order-controller.php");
$id = $_GET['id'];



?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container">

                </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>
