<?php

include_once '../controllers/stock-controller.php';
$stockController = new StockController();
$products = $stockController->getStocksByStore($_POST['id']);

$output = "";
$output .= "<tr>";
$output .= "<td><select name = 'pname[]' class='form-select product'>";
$output .= "<option>Choose Product</option>";
foreach($products as $product){
$output .="<option value = ".$product['product_id'].">".$product['pname']."</option>";
}
$output .="</select></td>";

$output .= '<td><input type="number" class="form-control price" name="price[]" id="" value="0"></td>
            <td><input type="number" class="form-control qty" name="qty[]" id="" value="0"></td>
            <td><input type="number" class="form-control discount" name="discount[]" id="" value="0"></td>
            <td><input type="number" class="form-control subtotal" name="subtotal[]" id="" value="0"></td>
            <td><button class="btn btn-danger btnRemove">X</button></td></tr>';

echo $output;
?>
