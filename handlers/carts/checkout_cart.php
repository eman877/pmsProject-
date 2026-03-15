<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $cartItems = $_SESSION['cart'] ?? [];

    $totalPrice = 0;
    foreach($cartItems as $item){
        $totalPrice += $item['price'] * $item['quantity'];
         $cartItems[] = $item['name'];
    }

    $ordersFile = '../../data/orders.json';
    $orders = [];

    if(file_exists($ordersFile)){
        $orders = json_decode(file_get_contents($ordersFile), true);
    }

    $newOrder = [
        'id' => uniqid(),
        'customer' => [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'notes' => $_POST['notes'],
        ],
        'products' => $cartItems,
        'total' => $totalPrice,
        'date' => date('Y-m-d H:i:s')
    ];

    $orders[] = $newOrder;

    file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT));

    unset($_SESSION['cart']);

    echo "Order submitted successfully! Your order ID is {$newOrder['id']}";
    header("Location:../../checkout.php");
    exit;
}
?>