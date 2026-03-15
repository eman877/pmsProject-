<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
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

    echo "<p class='text-success'>Order submitted successfully! Your order ID is {$newOrder['id']}</p>";
}
?>