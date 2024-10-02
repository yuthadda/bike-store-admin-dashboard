<?php

include_once("../layout/navbar.php");
include_once("../controllers/customer-controller.php");
$customerController = new CustomerController();
$customers = $customerController->getCustomers();

?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row mb-3 mt-2">
                            <h3>Customer Information</h3>
                        </div>
                        <div class="row col-md-4">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'addsuccess'){
                                   echo "<span class='alert alert-success'>Customer is successfully added.</span>";
                                }else if($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class='alert alert-success'>Customer is successfully updated.</span>";
                                }else if($_GET['msg'] == 'deletesuccess'){
                                    echo "<span class='alert alert-success'>Customer is successfully updated.</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <a href="create-customer.php" class="btn btn-dark">Create Customer</a>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="text"  id="" class="form-control search" placeholder="Search Customer Name.....">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark btnSearchCustomer">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row col-md-12">
                            <table class="table table-striped " id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                <?php

                                $count = 1;
                                foreach($customers as $customer){
                                    echo "
                                    <tr id=".$customer['customer_id'].">
                                    <td>".$count++."</td>
                                    <td>".$customer['first_name']."</td>
                                    <td>".$customer['last_name']."</td>
                                    <td>".$customer['phone']."</td>
                                    <td>".$customer['email']."</td>
                                    <td><a href='read-customer.php?id=".$customer['customer_id']."' class='btn btn-dark mx-1'>Read</a><a href='edit-customer.php?id=".$customer['customer_id']."' class='btn btn-dark mx-1'>Eidt</a><a href='delete-customer.php?id=".$customer['customer_id']."' class='btn btn-dark mx-1'>Delete</a><a class='btn btn-dark mx-1 btnDeleteCustomer'>Delete Ajax</a></td>
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


