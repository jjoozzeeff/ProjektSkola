<?php
include "parts/header.php";
$productManager = new ProductManager($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_path = $_POST['image_path'];

        $productManager->addProduct($name, $description, $price, $image_path);
    }

    if (isset($_POST['edit_submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_path = $_POST['image_path'];

        $productManager->editProduct($id, $name, $description, $price, $image_path);
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $productManager->deleteProduct($id);
}

?>

<div class="container py-5">
    <h1>Produkty</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Názov</th>
                <th>Popis</th>
                <th>Cena</th>
                <th>Obrázok</th>
                <th>Možnosti</th>
            </tr>
        </thead>
        <tbody>
            <?php $productManager->renderProducts(); ?>
        </tbody>
    </table>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-plus"></i></button>
</div>

<?php $productManager->renderAddModal(); ?>

<?php include "parts/footer.php"; ?>