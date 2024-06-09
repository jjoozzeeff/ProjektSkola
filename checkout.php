<?php
include "parts/header.php";
?>
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 0.75rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-top-left-radius: 0.75rem;
        border-top-right-radius: 0.75rem;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 0.5rem;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<?php
$checkoutManager = new CheckoutManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $checkoutManager->handleCheckout($_POST, $cartItems);
} else {
    echo '<div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Checkout</h4>
                        </div>
                        <div class="card-body">';
    $checkoutManager->renderCheckoutForm();
    echo '          </div>
                    </div>
                </div>
            </div>
          </div>';
}
include "parts/footer.php";
?>