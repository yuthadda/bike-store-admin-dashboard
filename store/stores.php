<?php
// session_start();
// if(!isset($_SESSION["username"]))
// {
//     header('location:login.php');
// }
include_once("../layout/navbar.php");

include_once ("../controllers/store-controller.php");

$storeController = new StoreController();
$stores = $storeController->getStores();


?>
           <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container">
                        <div class="row mb-3 mt-2">
                            <h3>Stores Information</h3>
                        </div>
                        <div class="row">
                        <?php
                            if(isset($_GET['msg']))
                            {
                                if($_GET['msg']== 'success')
                                {
                                    echo "<span class='alert alert-success'>Store is successfully added</span>";
                                }
                                else if($_GET['msg']== 'updatesuccess')
                                    {
                                        echo "<span class='alert alert-success'>Brand is successsfuly Updated </span>";
                                    }
                                    else if($_GET['msg']== 'updatefail')
                                    {
                                        echo "<span class='alert alert-danger'>Errro in Update</span>";
                                    }
                                    else if($_GET['msg']== 'deletesuccess')
                                    {
                                        echo "<span class='alert alert-success'>Success delete Store</span>";
                                    }
                                    else if($_GET['msg']== 'faildelete')
                                    {
                                        echo "<span class='alert alert-success'>Error delete Store</span>";
                                    }
                                else
                                {
                                    echo "<span class='alert alert-danger'>Error in adding store</span>";
                                }
                            }
                        ?>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <a href="create-store.php" class="btn btn-dark">Create Store</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control storeSearch" placeholder="Enter to Search">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark btnStoreSearch ">Search</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-stripped" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Store Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Street</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Zip_Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                        $count=1;
                                            foreach($stores as $store)
                                            {
                                                echo "<tr id=".$store['store_id'].">";
                                                echo "<td>".$count++."</td>";
                                                echo "<td>".$store['store_name']."</td>";
                                                echo "<td>".$store['phone']."</td>";
                                                echo "<td>".$store['email']."</td>";
                                                echo "<td>".$store['street']."</td>";
                                                echo "<td>".$store['city']."</td>";
                                                echo "<td>".$store['state']."</td>";
                                                echo "<td>".$store['zip_code']."</td>";
                                                echo "<td> <a class='btn btn-info mx-2' href='read-store.php?id=".$store['store_id']."'>Read</a>
                                                 <a class='btn btn-warning mx-2' href='edit-store.php?id=".$store['store_id']."'>Edit</a>
                                                  <button class='btn btn-danger btnStoreDelete'>Delete</button>"."</td>";
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
