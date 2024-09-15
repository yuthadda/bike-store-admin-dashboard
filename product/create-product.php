<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/brand-controller.php");
include_once("../controllers/category-controller.php");
include_once("../controllers/product-controller.php");

$brandController = new BrandController();
$brands = $brandController->getBrands();

$categoryController = new categoryController();
$categories = $categoryController->getAllCategory();


if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $brand_id = $_POST['brandId'];
    $category_id = $_POST['categoryId'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $productController = new productController();
    $result = $productController->addProduct($name,$brand_id,$category_id,$year,$price);

    if($result){
        header("location:products.php?msg=addsuccess");
    }else{
        header("location:products.php?msg=addfail");
    }

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
                    <h3> Product Information</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="label-control fw-bold">Product Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="label-control fw-bold">Choose Brand Id</label>
                                <select  id="" class="form-control" name="brandId">
                                    <option>Brand Id</option>
                                    <?php
                                     foreach($brands as $brand){
                                        echo "<option>
                                            ".$brand['brand_id']."
                                        </option>";
                                     }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label for="" class="label-control fw-bold">Choose Category Id</label>

                                <select  id="" class="form-control" name="categoryId">
                                    <option>Category Id</option>
                                    <?php

                                    foreach($categories as $category){
                                        echo "<option>
                                        ".$category['category_id']."
                                        </option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="label-control fw-bold">Model Year</label>
                                <input type="text" class="form-control" name="year">
                            </div>
                            <div class="mb-3">
                                <label for="" class="label-control fw-bold">List Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div>
                                <button class="btn btn-dark" name="submit">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include_once("../layout/footer.php");
        ?>
