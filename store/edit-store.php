<?php

include_once ('../layout/navbar.php');

include_once ("../controllers/store-controller.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $storeController = new StoreController();
    $store = $storeController->getStoreById($id);
}

if(isset($_POST['submit']))
{
    if(!empty($_POST['storename'] && $_POST['phone'] && $_POST['email'] && $_POST['street']
    && $_POST['city'] && $_POST['state'] && $_POST['zipcode']))
    {
        $storeController = new StoreController();
        $result=$storeController->updateStore($id,$_POST['storename'],$_POST['phone'],
        $_POST['email'],$_POST['street'],$_POST['city'],$_POST['state'],$_POST['zipcode']);
        if($result)
        {
            header('location:stores.php?msg=updatesuccess');

        }
        else
        header('location:stores.php?msg=updatefail');
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
                                    <div>
                                        <label for="" class="form-label">store Name</label>
                                        <input type="text" class="form-control" name="storename" value="<?php echo $store['store_name']  ?>">
                                    </div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $store['phone']  ?>">

                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $store['email']  ?>">

                                    <label for="" class="form-label">Street</label>
                                    <input type="text" class="form-control" name="street" value="<?php echo $store['street']  ?>">

                                    <label for="" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $store['city']  ?>">

                                    <label for="" class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" value="<?php echo $store['state']  ?>">

                                    <label for="" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode" value="<?php echo $store['zip_code']  ?>">
                                    <div class="mt-3">
                                        <button class="btn btn-dark" name="submit">Update</button>
                                    </div>
                                </form>
                                </div>
                        </div>

                    </div>
                </main>
<?php
include_once("../layout/footer.php");
?>
