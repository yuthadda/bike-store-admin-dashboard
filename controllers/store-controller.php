<?php

include_once ("../models/store.php");
    class StoreController{

        private $store;

        function addStore($name,$phone,$email,$street,$city,$state,$zipcode)
        {
            $store = new Store();
            $result = $store->insertStore($name,$phone,$email,$street,$city,$state,$zipcode);
            return $result;
        }

        function getStores()
        {
            $store = new Store();
            $stores = $store->getAllStores();
            return $stores;
        }

        function getStoreById($id)
        {
            $store = new Store();
            $storeinfo = $store->getStoreByID($id);
            return $storeinfo;
        }

        function updateStore($id,$name,$phone,$email,$street,$city,$state,$zipcode)
        {
            $store = new Store();
            $result =$store->UpdateStore($id,$name,$phone,$email,$street,$city,$state,$zipcode);
            return $result;
        }

        function deleteStore($id)
        {
            $store = new Store();
            $result =$store->deleteStore($id);
            return $result;

        }

        function searchStore($data)
        {
            $store = new Store();
            $result =$store->searchStore($data);
            return $result;
        }

    }


?>
