<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:login.php");
// }
include_once("../layout/navbar.php");
include_once("../controllers/customer-controller.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['first']) && !empty($_POST['last']) &&  !empty($_POST['email']) && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipcode']) ){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];

        $customerController = new CustomerController();
        $result = $customerController->addCustomer($first,$last,$phone,$email,$street,$city,$state,$zipcode);

        if($result){
            header("location:customers.php?msg=addsuccess");
        }else{
            header("location:customers.php?msg=addfail");
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
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">First Name</label>
                                        <input type="text" name="first" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Last Name</label>
                                        <input type="text" name="last" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Street</label>
                                        <input type="text" name="street" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">State</label>
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Zip Code</label>
                                        <input type="text" name="zipcode" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-dark" name="submit">Add Customer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>



