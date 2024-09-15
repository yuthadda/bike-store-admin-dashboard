<?php

include_once("../layout/navbar.php");
include_once("../controllers/brand-controller.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $brandController = new BrandController();
    $brand = $brandController->getBrandById($id);
}
if(isset($_POST['submit'])){
    if(!empty($_POST['brand'])){
        $brandController = new BrandController();
        $result = $brandController->updateBrand($id,$_POST['brand']);

        if($result){
            header('location:brands.php?msg=updatesuccess');
        }else{
            header('location:brands.php?msg=updatefail');
        }
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
                            Brand Information
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="mb-2">
                                        <label for="" class="form-label">Brand Name</label>
                                        <input type="text" name="brand" id="" class="form-control" value="<?php echo $brand['brand_name']?>">
                                    </div>
                                    <div>
                                        <button class="btn btn-dark" name="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                     </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


