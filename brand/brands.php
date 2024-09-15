<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/brand-controller.php");
$brandController = new BrandController();
$brands = $brandController->getBrands();
?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row mb-3 mt-2">
                            <h3>Brand Information</h3>
                        </div>
                        <div class="row">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg']=='success'){
                                    echo '<span class="alert alert-success">Brand is successfully added!</span>';
                                }else if($_GET['msg']=='updatesuccess'){
                                    echo '<span class="alert alert-success">Brand is successfully updated!</span>';
                                }else if($_GET['msg']=='updatefail'){
                                    echo '<span class="alert alert-success">Erron in updating!</span>';
                                }else if($_GET['msg']=='deleted'){
                                    echo '<span class="alert alert-success">Brand is successfully deleted!</span>';
                                }else if($_GET['msg']=='deletefail'){
                                    echo '<span class="alert alert-success">Error in delete!</span>';
                                }
                                else{
                                    echo '<span class="alert alert-danger">Error in adding!</span>';
                                }
                            }
                            ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <a href="create-brand.php" class="btn btn-dark">Create Brand</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="text" name="name" id="" class="form-control search" placeholder="Enter Brand name">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark btnSearch">Search</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Brand Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="tbody">
                                        <?php
                                        $count = 1;
                                        foreach($brands as $brand){
                                            echo "<tr id=".$brand['brand_id'].">";
                                            echo "<td>".$count++."</td>";
                                            echo "<td>".$brand['brand_name']."</td>";
                                            echo "<td><a class='btn btn-info mx-1' href='read-brand.php?id=".$brand['brand_id']."'>Read</a><a class='btn btn-warning  mx-1' href='edit-brand.php?id=".$brand['brand_id']."'>Edit</a><a class='btn btn-danger  mx-1' href='delete-brand.php?id=".$brand['brand_id']."'>Delete</a><button class='btn btn-dark btnDelete'>Delete Ajax</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>
