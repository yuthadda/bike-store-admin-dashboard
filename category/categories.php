<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/category-controller.php");
$categoryController = new categoryController();
$categories = $categoryController->getAllCategory();
?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row mb-3 mt-2">
                            <h3>Category Information</h3>
                        </div>
                        <div class="row mb-3">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'success'){
                                    echo "
                                   <span class='alert alert-success'>Category is successfully added.</span>
                                    ";
                                }else if($_GET['msg'] == 'deletesuccess'){
                                    echo "
                                    <span class='alert alert-success'>Category is successfully deleted.</span>
                                    ";
                                }else if($_GET['msg'] == 'updatesuccess'){
                                    echo "
                                    <span class='alert alert-success'>Category is successfully updated.</span>
                                    ";
                                }
                            }

                            ?>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <a href="create-categories.php" class="btn btn-dark">Create Category</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control search" placeholder="Enter Category Name...">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark btnSearchCategory">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <table class="table table-striped" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
                                    $count = 1;
                                    foreach($categories as $category){
                                        echo "
                                        <tr id=".$category['category_id'].">
                                        <td>".$count++."</td>
                                        <td>".$category['category_name']."</td>
                                        <td><a href='read-categories.php?id=".$category['category_id']."' class='btn btn-dark mx-1'>Read</a><a href='edit-category.php?id=".$category['category_id']."' class='btn btn-dark mx-1'>Edit</a><a href='delete-category.php?id=".$category['category_id']."' class='btn btn-dark mx-1'>Delete</a><a class='btn btn-dark mx-1 btnDeleteCtg'>Delete Ajax</a></td>
                                        </tr>
                                        ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>


