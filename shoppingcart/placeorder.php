<?php

// process the shopping car object and update the remaining quantity in the database

// process payment information

// reset the shopping cart to empty
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;


// session_unset(); // unset all session variables if needed

unset($_SESSION['cart']); // reset the cart array
// destroy the session 
// session_destroy(); // destroy all session variables, if needed

?>

<?= template_header('Place Order') ?>

<div class="placeorder content-wrapper">
    <h1>Your Order Has Been Placed</h1>
    <h1> Total
        <?= $num_items_in_cart ?>
        items were processed
    </h1>
    <p>Thank you for ordering with us! We'll contact you by email with your order details.</p>
</div>



<?= template_footer() ?>