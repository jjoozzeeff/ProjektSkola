<?php
include "parts/header.php";
$cart = new Cart($db);

$kosikDetailProduktu = [];
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $kosikDetailProduktu = $cart->getCartDetails($_SESSION['cart']);
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
    <?php $cart->renderCart($kosikDetailProduktu); ?>
</div>
<div class="container text-right">
    <?php if (!empty($kosikDetailProduktu)) { ?>
        <a href="checkout.php">
            <button class="btn btn-success btn-lg">
                Pokračovať v objednávke
            </button>
        </a>
    <?php } ?>
</div>
<br><br><br><br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.btn-remove').click(function() {
            var productId = $(this).data('product-id');
            $.ajax({
                url: 'classes/remove_from_cart.php',
                type: 'POST',
                data: {
                    product_id: productId
                },
                success: function(result) {
                    alert(result);
                    window.location.reload();
                }
            });
        });
    });
</script>
<?php include "parts/footer.php" ?>