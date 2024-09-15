<?php

include_once ('includes/db.php');
if(Database::connect()!=null){
    echo 'successful connection';
}else{
    echo 'no connection';
}
?>

