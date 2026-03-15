<?php
session_start();

$name  = $_POST['name'];
$price = $_POST['price'];

$products = json_decode(file_get_contents("../../data/products.json"), true);

 $product = null;

foreach($products as $p){
    if($p['name'] == $name){
        $product = $p;
        break;
    }
}

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$found = false;

foreach($_SESSION['cart'] as &$item){
    if($item['name'] == $name){
        $item['quantity']++;
        $found = true;
        break;
    }
}

if(!$found){
    $product['quantity'] = 1;
    $_SESSION['cart'][] = $product;
}
header("Location:../../cart.php");
exit;