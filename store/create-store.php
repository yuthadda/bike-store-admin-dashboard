<?php
include_once("../layout/navbar.php");

include_once ("../controllers/store-controller.php");

if(isset($_POST['submit']))
{
    if(!empty($_POST['storename'] && $_POST['phone'] && $_POST['email'] && $_POST['street']
     && $_POST['city'] && $_POST['state'] && $_POST['zipcode']))
    {
        $store = $_POST['storename'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
    }

    $storeController = new StoreController();
    $result = $storeController->addStore($store,$phone,$email,$street,$city,$state,$zipcode);

    if($result)
    {
        header('location:stores.php?msg=success');
    }
    else
    {
        header('location:stores.php?msg=fail');
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
                            Store Information
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div>
                                    <label for="" class="form-label">Store Name</label>
                                    <input type="text" class="form-control" name="storename">
                                    </div>

                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone">

                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">

                                    <label for="" class="form-label">Street</label>
                                    <input type="text" class="form-control" name="street">

                                    <label for="" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city">

                                    <label for="" class="form-label">State</label>
                                    <input type="text" class="form-control" name="state">

                                    <label for="" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode">

                                    <div>
                                        <button class="btn btn-dark" name="submit">Add store</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include_once("../layout/footer.php");
?>
