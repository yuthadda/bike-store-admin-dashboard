<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/product-controller.php");

$productController = new productController();
$products = $productController->getAllProduct();

?>
<div id="layoutSidenav">
    <?php
    include_once("../layout/sidebar.php");

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row mb-3 mt-2">
                    <h3>Product Information</h3>
                </div>
                <div class="row col-8">
                    <?php
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == 'addsuccess') {
                            echo "<span class='alert alert-success'>Product is successfully added.</span>";
                        } else if ($_GET['msg'] == 'deletesuccess') {
                            echo "<span class='alert alert-success'>Product is successfully deleted.</span>";
                        }
                    }
                    ?>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">
                        <a href="create-product.php" class="btn btn-dark">Create Product</a>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control search" placeholder="Enter Product Name...">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark btnSearchProduct">Search</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <table class="table table-striped" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Brand Id</th>
                                        <th>Category Id</th>
                                        <th>Model Year</th>
                                        <th>List Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
                                    $count = 1;
                                    foreach ($products as $product) {

                                        echo "
                                                    <tr id=" . $product['product_id'] . ">
                                                    <td>" . $count++ . "</td>
                                                    <td>" . $product['product_name'] . "</td>
                                                    <td>" . $product['brand_id'] . "</td>
                                                    <td>" . $product['category_id'] . "</td>
                                                    <td>" . $product['model_year'] . "</td>
                                                    <td>" . $product['list_price'] . "</td>
                                                    <td><a href='read-product.php?id=" . $product['product_id'] . "' class='btn btn-dark mx-1'>Read</a><a href='edit-product.php?id=" . $product['product_id'] . "' class='btn btn-dark mx-1'>Edit</a><a href='delete-product.php?id=" . $product['product_id'] . "' class='btn btn-dark mx-1'>Delete</a><a class='btn btn-dark mx-1 btnDeleteProduct'>Delete Ajax</a></td>
                                                    </tr>
                                                    ";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include_once("../layout/footer.php");
        ?>
