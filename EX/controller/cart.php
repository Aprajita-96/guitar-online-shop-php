<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<?php

$my_session= 'cart';

$action= filter_input(INPUT_POST,'actions');

if($action==NULL){
    $action=filter_input(INPUT_GET,'actions');
    if($action==NULL){
        $action='add_items';
    }
}

if($action=='add_items'){
    $product_id=filter_input(INPUT_POST,'product_id');
    $quantity=filter_input(INPUT_POST,'quantity',FILTER_VALIDATE_INT);
    $unit_price= filter_input(INPUT_POST,'unit_price');
    $name= filter_input(INPUT_POST,'name');

    $item=array(
        'name'=>$name,
        'cost'=>$unit_price,
        'qty'=>$quantity
    );
    $lifetime=60*60*24*7; //one week in seconds
    session_set_cookie_params($lifetime,'/');
    //_SESSION is a superglobal variable
    if(!isset($_SESSION)) session_start();

    if(empty($_SESSION[$my_session])) $_SESSION[$my_session]=array();

    $_SESSION[$my_session][$product_id]= $item;

    include '../view/cart_view.php';
}
else if($action=="empty_cart"){
    if(!isset($_SESSION)) session_start();

    unset($_SESSION[$my_session]);
    include '../view/cart_view.php';

}else if($action=="view_cart"){
    include '../view/cart_view.php';

}

?>