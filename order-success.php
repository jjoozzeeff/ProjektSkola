<?php include "parts/header.php"; ?>

<?php
$orderedItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$cartDetails = [];

if (!empty($orderedItems)) {
    include "classes/cart.php";
    $cart = new Cart($db);
    $cartDetails = $cart->getCartDetails($orderedItems);
}
$_SESSION['cart'] = [];
?>

<div class="container py-5">
    <div class="row">
        <div class="col">
            <h1 class="display-4">Objednávka bola úspešná!</h1>
            <p class="lead">Ďakujeme za vašu objednávku. Tu sú detaily vašej objednávky:</p>
            <ul class="list-group">
                <?php foreach ($cartDetails as $product) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= $product['image_path'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded">
                            </div>
                            <div class="col-md-10">
                                <h5><?= htmlspecialchars($product['name']) ?></h5>
                                <p><?= htmlspecialchars($product['description']) ?></p>
                                <p>Cena: <?= htmlspecialchars($product['price']) ?> €</p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php include "parts/footer.php" ?>