<?php
session_start();
include "Database.php";
include "Shop.php";

$db = new Database();
$shop = new Shop($db);

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    if ($shop->removeFromCart($productId)) {
        echo "Produkt bol vymazaný!";
    } else {
        echo "Produkt sa nenašiel v košíku!";
    }
}

$db->close();
