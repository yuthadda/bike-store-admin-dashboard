<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/category-controller.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }
    $categoryController = new categoryController();
    $result = $categoryController->addCaterory($name);
    if($result){
        header("location:categories.php?msg=success");
    }else{
        header("location:categories.php?msg=fail");
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
                            Category Information
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="mt-5">
                                        <label for="" class="form-label">Category Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn btn-dark" name="submit">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


