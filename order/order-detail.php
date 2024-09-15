<?php
include_once("../layout/navbar.php");
include_once("../controllers/order-controller.php");

$id = $_GET['id'];
$orderController = new Order_controller();
$order = $orderController->getOrderById($id);

$orderController = new Order_controller();
$order_items = $orderController->getOrderItems($id);

?>
<div id="layoutSidenav">
    <?php
    include_once("../layout/sidebar.php");

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row">
                    <h3>Order Invoice</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="create-order.php" class="btn btn-dark">Back To Orders</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <?php
                        echo "Customer Name : <br>";
                        echo $order['cfn'] . " " . $order['cln'];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo "Order Date : <br>";
                        echo $order['order_date'];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo "Required Date : <br>";
                        echo $order['required_date'];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo "Shipped Date : <br>";
                        echo $order['shipped_date'];
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <?php
                        echo "Store Name : <br>";
                        echo $order['sname'];
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        echo "Staff Name : <br>";
                        echo $order['sfn'] . " " . $order['sln'];
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Discount</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach($order_items as $item){
                                    echo "
                                    <tr>
                                    <td>".$item['pname']."</td>
                                    <td>".$item['list_price']."</td>
                                    <td>".$item['quantity']."</td>
                                    <td>".$item['discount']."</td>
                                    <td>".(($item['list_price']*$item['quantity'])-$item['discount'])."</td>
                                    </tr>
                                    ";
                                    $total +=(($item['list_price']*$item['quantity'])-$item['discount']);
                                }
                                echo "<tr>
                                <td colspan='4'>Total</td>
                                <td>".$total."</td>
                                </tr>";

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
