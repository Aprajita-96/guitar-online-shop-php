<?php

require '../model/database.php';
require '../model/catelog_db.php';

$actions=filter_input(INPUT_POST,'action');
if($actions==NULL){
    $actions=filter_input(INPUT_GET,'action');
    if($actions==NULL){
        $actions='list_products';
    }
}
if($actions=='list_products'){
    $category_id=filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);
    if($category_id==NULL || $category_id==FALSE){
        $category_id=1;
    }
    $category_name= get_category_name($category_id);
    $categories=get_categories();
    $products= get_products_by_category($category_id);

    include "../view/product_list_manager.php";
}



?>