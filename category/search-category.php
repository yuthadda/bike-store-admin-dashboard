<?php

include_once("../controllers/category-controller.php");
$data = $_POST['value'];

$categoryController = new categoryController();
$categories = $categoryController->searchCategory($data);
$count = 1;
$output = "";
foreach($categories as $category){
        $output .="
            <tr id=".$category['category_id'].">
            <td>".$count++."</td>
            <td>".$category['category_name']."</td>
            <td><a href='read-categories.php?id=".$category['category_id']."' class='btn btn-danger mx-1'>Read</a><a href='edit-category.php?id=".$category['category_id']."' class='btn btn-info mx-1'>Edit</a><a href='delete-category.php?id=".$category['category_id']."' class='btn btn-success mx-1'>Delete</a><a class='btn btn-primary mx-1 btnDeleteCtg'>Delete Ajax</a></td>
            </tr>
        ";
}
echo $output;

?>
