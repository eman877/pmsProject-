<?php
session_start();

$index = $_POST['index'];
$quantity = (int)$_POST['quantity'];
 

if(isset($_SESSION['cart'][$index])){

   
    if($quantity < 1){
        $quantity = 1;
    }

   
    $_SESSION['cart'][$index]['quantity'] = $quantity;
}


header("Location: ../../cart.php");
exit;