<?php
include "parts/header.php";

$orderDetailsManager = new OrderDetailsManager($db);

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: objednavky.php");
    exit;
}

$orderId = $_GET['id'];
$orderDetailsManager->renderOrderDetails($orderId);

include "parts/footer.php";
