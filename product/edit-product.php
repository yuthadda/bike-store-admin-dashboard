<?php

include_once("../layout/navbar.php");
include_once("../controllers/product-controller.php");
include_once("../controllers/brand-controller.php");
include_once("../controllers/category-controller.php");

$id = $_GET['id'];
$productController = new productController();
$product = $productController->getProductById($id);

$brandController = new BrandController();
$brands = $brandController->getBrands();

$categoryController = new categoryController();
$categories = $categoryController->getAllCategory();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $brand_id = $_POST['brandId'];
    $category_id = $_POST['categoryId'];
    $model_year = $_POST['model'];
    $list_price = $_POST['price'];

    $productController = new productController();
    $result = $productController->updateProduct($id,$name,$brand_id,$category_id,$model_year,$list_price);
    if($result){
        header("location:products.php?msg=updatesuccess");
    }else{
        header("location:products.php?msg=updatefail");
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
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <form action="" method="post">

                                <div class="mb-2">
                                <label for="" class="form-label fw-bold">Product Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $product['product_name'] ?>">
                                </div>

                                <div class="mb-2">
                                <label for="" class="form-label fw-bold">Product Id</label>
                                <select  id="" class="form-control" name="brandId">
                                    <option><?php echo $product['brand_id'] ?></option>
                                    <?php
                                     foreach($brands as $brand){
                                        echo "<option>
                                            ".$brand['brand_id']."
                                        </option>";
                                     }
                                    ?>
                                </select>
                                </div>

                                <div class="mb-2">
                                <label for="" class="form-label fw-bold">Category Id</label>
                                <select  id="" class="form-control" name="categoryId">
                                    <option><?php echo $product['category_id'] ?></option>
                                    <?php
                                     foreach($categories as $category){
                                        echo "<option>
                                            ".$category['category_id']."
                                        </option>";
                                     }
                                    ?>
                                </select>
                                </div>

                                <div class="mb-2">
                                <label for="" class="form-label fw-bold">Model Year</label>
                                <input type="text" class="form-control" name="model" value="<?php echo $product['model_year'] ?>">
                                </div>

                                <div class="mb-2">
                                <label for="" class="form-label fw-bold">List Price</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $product['list_price'] ?>">
                                </div>

                                <div class="mb-2">
                                    <button type="submit" name="submit" class="btn btn-dark">Update</button>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>



