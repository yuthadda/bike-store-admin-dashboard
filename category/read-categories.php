<?php

include_once("../layout/navbar.php");
include_once("../controllers/category-controller.php");

$id = $_GET['id'];
$categoryController = new categoryController();
$category = $categoryController->getCategoryById($id);
?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container mt-2">
                        <h3>Category Name: <?php echo $category['category_name']
                        ?></h3>

                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


