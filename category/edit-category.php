<?php

include_once("../layout/navbar.php");
include_once("../controllers/category-controller.php");

$id = $_GET['id'];
$categoryController = new categoryController();
$category = $categoryController->getCategoryById($id);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $categoryController = new categoryController();
    $result = $categoryController->updateCategory($id,$name);
    if($result){
        header("location:categories.php?msg=updatesuccess");
    }else{
        header("location:categories.php?msg=updatdfail");
    }
}
?>
<div id="layoutSidenav">
    <?php
    include_once("../layout/sidebar.php");

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <form action="" method="post">
                        <label for="" class="form-label fw-bold mt-2">Category Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $category['category_name'] ?>">
                        <button name="submit" class="btn btn-dark mt-3">Update</button>
                    </form>
                </div>
            </div>
        </main>
        <?php
        include_once("../layout/footer.php");
        ?>
