<?php require_once ('inc/header.php'); ?>

<?php
$json = file_get_contents("data/orders.json");
$orders = json_decode($json, true) ?? [];
?>

<h2>My Orders</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Order ID</th>
        <th>Price</th>
        <th>created_at</th>
    </tr>

    <?php foreach($orders as $order){ ?>
    <tr>
        <td><?php echo $order['id']; ?></td>
        <td><?php echo $order['total']; ?></td>
        <td><?php echo $order['date']; ?></td>
    </tr>
    <?php } ?>

</table>
<?php require_once ('inc/footer.php'); ?>