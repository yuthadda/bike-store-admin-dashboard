<?php
include_once("../layout/navbar.php");
include_once("../controllers/order-controller.php");
include_once("../controllers/customer-controller.php");
include_once("../controllers/store-controller.php");
include_once("../controllers/stock-controller.php");
include_once("../controllers/staff-controller.php");

$customerController = new CustomerController();
$customers = $customerController->getCustomers();

$storeController = new StoreController();
$stores = $storeController->getStores();


$stockController = new StockController();
$stocks = $stockController->getStocksByStore($stores[0]['store_id']);

$staffController = new StaffController();
$staffs = $staffController->getStaffByProductId($stores[0]['store_id']);


if(isset($_POST['submit'])){

    $cid = $_POST['cname'];
    $sid = $_POST['sname'];
    $staffid = $_POST['staff_id'];
    $order_date = $_POST['order_date'];
    $required_date = $_POST['required_date'];

    $product_names = $_POST['pname'];
    $prices = $_POST['price'];
    $quantities = $_POST['qty'];
    $discounts = $_POST['discount'];
    $subTotals = $_POST['subtotal'];

    for($index=0 ; $index <count($product_names); $index++){

        $products[$index][0] = $product_names[$index];
        $products[$index][1] = $prices[$index];
        $products[$index][2] = $quantities[$index];
        $products[$index][3] = $discounts[$index];
        $products[$index][4] = $subTotals[$index];
    }

    $orderController = new Order_controller();
    $result = $orderController->addOrder($cid,$sid,$staffid,$order_date,$required_date,$products);

    if($result){
        header("location:order-index.php?msg=success");
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
                    <h2>Order Form</h2>
                </div>
                <div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="form-label">Customer Name: </label>
                                <select name="cname" id="" class="form-select">
                                    <?php
                                    foreach ($customers as $customer) {
                                        echo "

                                                <option value=" . $customer['customer_id'] . ">" . $customer['first_name'] . " " . $customer['last_name'] . "</option>
                                                ";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="" class="form-label">Store Name: </label>
                                <select name="sname" id="store" class="form-select store">
                                    <?php
                                    foreach ($stores as $store) {
                                        echo "

                                                <option value=" . $store['store_id'] . ">" . $store['store_name'] . "</option>
                                                ";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="" class="form-label">Staff Name: </label>
                                <select name="staff_id" id="staff" class="form-select">
                                    <?php
                                    echo "<option>Choose Staff</option>";
                                    foreach ($staffs as $staff) {
                                        echo "

                                                <option value=" . $staff['staff_id'] . ">" . $staff['first_name']." ".$staff['last_name'] . "</option>
                                                ";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="" class="form-label">Order Date</label>
                                <input type="date" name="order_date" class="form-control" id="">
                            </div>

                            <div class="col-md-2">
                                <label for="" class="form-label">Required Date</label>
                                <input type="date" name="required_date" class="form-control" id="">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <button class="btn btn-success btnAdd">
                                    AddMore
                                </button>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Qty</th>
                                            <th>Discount</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td>
                                                <select name="pname[]" class="form-select product" id="">
                                                    <?php
                                                    echo "<option>Choose Product</option>";
                                                    foreach ($stocks as $stock) {
                                                        echo "
                                                    <option value=" . $stock['product_id'] . ">" . $stock['pname'] . "</option>
                                                ";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="number" class="form-control price" name="price[]" id="" value="0"></td>
                                            <td><input type="number" class="form-control qty" name="qty[]" id="" value="0"></td>
                                            <td><input type="number" class="form-control discount" name="discount[]" id="" value="0"></td>
                                            <td><input type="number" class="form-control subtotal" name="subtotal[]" id="" value="0"></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <button class="btn btn-dark" type="submit" name="submit">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>





            </div>
        </main>

        <script src="../scripts/jquery-3.7.1.min.js"></script>
        <script>


            $(document).on('click', '.btnAdd', function(event) {
                event.preventDefault();

                let store = document.getElementById('store');
                // console.log(store.value);

                $.ajax({
                    url: "get-stock.php",
                    method: "post",
                    data: {
                        id: store.value
                    },
                    success: function(response) {
                        $("#tbody").append(response);
                    }
                })

                // let output;
                // output+='<tr><td><select class="form-select" name="pname"></select></td>'
                // +'<td><input type="number" class="form-control" name="price" id=""></td>'
                // +'<td><input type="number" class="form-control" name="qty" id=""></td>'
                // +'<td><input type="number" class="form-control" name="discount" id=""></td>'
                // +'<td><input type="number" class="form-control" name="subtotal" id=""></td>'
                // +'<td><button class="btn btn-danger btnRemove">X</button></td></tr>';


            })

            $(document).on('click', '.btnRemove', function(event) {
                event.preventDefault();
                let tr = $(this).parent().parent();
                $(tr).remove();
            })

            $(document).on('change','.product',function(){
                let pid = $(this).val();
                let price = $(this).parent().next().children();
                let qty = $(this).parent().next().next().children().val();
                let discount = $(this).parent().next().next().next().children().val();
                let subtotal = $(this).parent().next().next().next().next().children();

                $.ajax({
                    url : 'get-price.php',
                    method : 'post',
                    data : {id:pid},
                    success :function(response){
                        price[0].value =response;
                        let total = (price.val() * qty)-(qty*discount);
                        subtotal.val(total);
                    }
                })
            })

            $(document).on('change','.store',function(){
                let id = $(this).val();
                let product = $(this).parent().parent().next().next().children().children().children("#tbody").children().children().children().children();
                let price = product.parent().parent().next().children().val(0);
                let qty = price.parent().next().children().val(0);
                let discount = qty.parent().next().children().val(0);
                let subtotal = discount.parent().next().children().val(0);
                // console.log(product);

                $.ajax({
                    url : 'get-product.php',
                    method : 'post',
                    data : {id:id},
                    success : function(response){
                        product.remove();
                        $(".product").append(response);
                    }
                })
            })

            $(document).on('change','.store',function(){
                let id = $(this).val();

                let staff = $(this).parent().next().children().children();
                // console.log(staff);

                $.ajax({
                    url : 'get-staff.php',
                    method : 'post',
                    data : {id:id},
                    success : function(response){
                        staff.remove();
                        $("#staff").append(response);
                    }
                })
            })

            $(document).on('keyup','.qty',function(){
                let qty = $(this).val();
                let price = $(this).parent().prev().children().val();
                let discount = $(this).parent().next().children().val();
                let subtotal = $(this).parent().next().next().children();
                let total =(price*qty) - (qty * discount);
                subtotal.val(total);
            })

            $(document).on('keyup','.discount',function(){
                let discount = $(this).val();
                let price = $(this).parent().prev().prev().children().val();
                let qty = $(this).parent().prev().children().val();
                let subtotal = $(this).parent().next().children();
                let total =(price*qty) - (qty*discount);
                subtotal.val(total);
            })

       </script>


        <?php
        include_once("../layout/footer.php");
        ?>
