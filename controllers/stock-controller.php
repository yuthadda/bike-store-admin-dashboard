<?php

include_once("../models/stock.php");

class StockController{

    function getStocksByStore($store_id){
    $stock = new Stock();
    return $stock->getStocksByStore($store_id);

   }
}


?>
