<?php
include_once("../layout/navbar.php");
include_once("../controllers/customer-controller.php");
$id = $_GET['id'];
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
        $result = $customerController->updateCustomer($id,$first,$last,$phone,$email,$street,$city,$state,$zipcode);

        if($result){
            header("location:customers.php?msg=updatesuccess");
        }else{
            header("location:customers.php?msg=updatefail");
        }
    }}

    $customerController = new CustomerController();
    $customer = $customerController->getCustomerById($id);

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
                                        <input type="text" name="first" class="form-control" value="<?php echo $customer['first_name'] ?>" >
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Last Name</label>
                                        <input type="text" name="last" class="form-control" value="<?php echo $customer['last_name'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?php echo $customer['phone'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $customer['email'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Street</label>
                                        <input type="text" name="street" class="form-control" value="<?php echo $customer['street'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">City</label>
                                        <input type="text" name="city" class="form-control" value="<?php echo $customer['city'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">State</label>
                                        <input type="text" name="state" class="form-control" value="<?php echo $customer['state'] ?>">
                                    </div>
                                    <div class="mt-2">
                                        <label for="" class="form-label fw-bold">Zip Code</label>
                                        <input type="text" name="zipcode" class="form-control" value="<?php echo $customer['zip_code'] ?>">
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

