<?php
include "parts/header.php";

$orderManager = new OrderManager($db);
?>

<div class="container mt-3">
    <h1>Objednávky</h1>
    <?php $orderManager->renderOrdersTable(); ?>
</div>

<?php include "parts/footer.php"; ?>