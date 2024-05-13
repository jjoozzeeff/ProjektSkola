<?php 
include "parts/header.php";
$kosikDetailProduktu = [];
 
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $placeholder = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    try {
        $stmt = $conn->prepare("SELECT * FROM produkty WHERE id IN ($placeholder)");
        $stmt->execute(array_values($_SESSION['cart']));
        $kosikDetailProduktu = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Poziadavka zlyhala: " . $e->getMessage();
    }
}
?>
<style>
    .cart-item {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #dee2e6;
    }
    .card-image {
        width: 100px;
        height: auto;
    }
    .card-header {
        background-color: #dee2e6;
        padding: 1rem 0;
        margin-bottom: 2rem;
    }
</style>
<div class="container mt-3">
    <div class="cart-header">
        <h2>Váš nákupný košík</h2>
    </div>
    <?php if (!empty($kosikDetailProduktu)): ?>
        <?php foreach ($kosikDetailProduktu as $product): ?>
            <div class="row cart-item">
                <div class="col-md-2">
                    <img src="<?= $product['img']?>" alt="Obrázok produktu" class="card-image ">
                </div>
 
                <div class="col-md-5">
                    <h5 class="mt-2"><?= htmlspecialchars($product['Nazov'])?></h5>
                </div>
 
                <div class="col-md-3 card-price">
                    <p class="mt-2"><?= htmlspecialchars($product['Cena'])?></p>
                </div>
 
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm btn-remove mt-2" data-product-id=<?=$product['ID'] ?>>Vymazať</button>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-12 text-right">
                <h4 class="cart-total">Celková suma: <?=htmlspecialchars(array_sum(array_column($kosikDetailProduktu, 'Cena'))) ?> €</h4>
            </div>
        </div>
    <?php else: ?>
        <p>Váš košík je prázdny</p>
    <?php endif; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('.btn-remove').click (function(){
            var productId = $(this).data('product-id');
            $.ajax({
                url:'backend/odstranit_z_kosika.php',
                type: 'POST', 
                data:{ product_id: productId },
                success: function(result) {
                    window.location.reload();
                }
            });
        });
    });
</script>
<?php include "parts/footer.php"?>