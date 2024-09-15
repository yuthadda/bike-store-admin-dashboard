<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/brand-controller.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['brand'])){
        $brand = $_POST['brand'];
    }
    $brandController = new BrandController();
    $result = $brandController->addBrand($brand);

    if($result){
        header("location:brands.php?msg=success");
    }else{
        header('location:brands.php?msg=fail');
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
                                    <div class="mt-5">
                                        <label for="" class="form-label">Brand Name</label>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn btn-dark" name="submit">Add Brand</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


