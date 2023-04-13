<?php


function get_category_name($categor_id){
    global $db;
    $query="SELECT * from categories WHERE categoryID=:category_id";
    $statement=$db->prepare($query);
    $statement->bindValue(":category_id",$categor_id);
    $statement->execute();

    $row= $statement->fetch();
    $statement->closeCursor();

    $category_name=$row['categoryName'];
    return $category_name;
}
function get_categories(){
    global $db;
    $query="SELECT * from categories";
    $statement=$db->prepare($query);
    $statement->execute();

    $row= $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function get_products_by_category($categor_id){
    global $db;
    $query="SELECT * from products WHERE products.categoryID=:category_id";
    $statement=$db->prepare($query);
    $statement->bindValue(":category_id",$categor_id);
    $statement->execute();

    $row= $statement->fetchAll();
    $statement->closeCursor();
    return $row;
}
function get_product($product_id){
    global $db;
    $query="SELECT * from products WHERE productID=:product_id";
    $statement=$db->prepare($query);
    $statement->bindValue(":product_id",$product_id);
    $statement->execute();

    $row= $statement->fetch();
    $statement->closeCursor();
    return $row;
}

?>