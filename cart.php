<?php require_once('inc/header.php'); ?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tbody>

<?php

// session_start();
$totalPrice = 0;

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";



if(!empty($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $index => $item){
    
        $itemTotal = (float) $item['price'] *  $item['quantity'];
        $totalPrice += $itemTotal;
?>
<form method="POST" action="handlers/carts/update_cart.php">
<tr>
    <th scope="row"><?= $index + 1 ?></th>

    <td><?= $item['name'] ?></td>

    <td><?= $item['price'] ?></td>

    <td>
        
        <input type="hidden" name="index" value="<?= $index ?>">

       <input type="number"
       name="quantity"
       value="<?= $item['quantity'] ?>"
       min="1"
       onchange="this.form.submit()">
</form>
    </td>

    <td>$<?= $itemTotal ?></td>
    
    <td>

<form method="POST" action="handlers/carts/delete_product.php">

<input type="hidden" name="index" value="<?= $index ?>">

<button type="submit" class="btn btn-danger">
Delete
</button>

</form>

</td>
</tr>


<?php
    }

}else{
    echo "<tr><td colspan='6' class='text-center'>Cart is empty</td></tr>";
}
?>

<tr>
    <td colspan="2">Total Price</td>
    <td colspan="3">
        <h3>$<?= $totalPrice ?></h3>
    </td>
    <td>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </td>
</tr>

   </tbody>
  </table>
 </div>
 </div>
</div>
</section>
<?php require_once('inc/footer.php'); ?>