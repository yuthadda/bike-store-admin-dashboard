<?php
include_once("../layout/navbar.php");
include_once("../controllers/order-controller.php");

$orderController = new Order_controller();
$orders = $orderController->getOrders();

?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row">
                        <?php
                        if(isset($_GET['msg']) && $_GET['msg'] == 'success'){
                            echo "<span class='alert alert-success'>Order is successfully added.</span>";
                        }
                        ?>
                        </div>
                        <div class="row mb-3 mt-2">
                            <h3>Order Information</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="create-order.php" class="btn btn-dark">Create Order</a>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <table class="table table-striped" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Order Status</th>
                                        <th>Order Date</th>
                                        <th>Required Date</th>
                                        <th>Shipped Date</th>
                                        <th>Store Name</th>
                                        <th>Staff Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach($orders as $order){
                                            echo "
                                            <tr id=".$order['order_id'].">
                                            <td>".$count++."</td>
                                            <td>".$order['cfn']." ".$order['cln']."</td>
                                            <td>".$order['order_status']."</td>
                                            <td>".$order['order_date']."</td>
                                            <td>".$order['required_date']."</td>
                                            <td>".$order['shipped_date']."</td>
                                            <td>".$order['sname']."</td>
                                            <td>".$order['sfn']." ".$order['sln']."</td>
                                            <td><a class='btn btn-dark mx-1' href='order-detail.php?id=".$order['order_id']."'>Detail</a><button class='btn btn-dark btnSend' onClick='sendEmail(".$order['order_id'].")'>Send Email</button></td>
                                            </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>

                <script>
                    function sendEmail(id){
                        console.log(id);
                        $.ajax({
                            url:'send.php',
                            method:'post',
                            data : {data:id},
                            success:function(response){
                                alert(response);
                            }
                        })
                    }
                </script>
            <?php
            include_once("../layout/footer.php");
            ?>
