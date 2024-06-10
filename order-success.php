<?php
include "parts/header.php";

$orderedItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$cartDetails = [];

if (!empty($orderedItems)) {
    include "classes/cart.php";
    $cart = new Cart($db);
    $cartDetails = $cart->getCartDetails($orderedItems);
}
$_SESSION['cart'] = [];
?>

<div class="container mt-3">
    <h1>Objednávka bola úspešná!</h1>
    <p>Ďakujeme za vašu objednávku. Tu sú detaily vašej objednávky:</p>
    <ul>
        <?php
        foreach ($cartDetails as $product) {
            echo '<li>' . htmlspecialchars($product['name']) . ' - ' . htmlspecialchars($product['price']) . ' €</li>';
        }
        ?>
    </ul>
</div>

<?php include "parts/footer.php" ?>