<?php
include_once("../layout/navbar.php");
include_once("../controllers/order-controller.php");
$id = $_GET['id'];

$orderController = new Order_controller();
$order = $orderController->getOrderById($id);

?>
        <div id="layoutSidenav">
            <?php
                include_once("../layout/sidebar.php");

            ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container">
                    <h3>Order Id:<?php echo $order['order_id']?></h3>
                </div>
                </main>
            <?php
            include_once("../layout/footer.php");
            ?>
