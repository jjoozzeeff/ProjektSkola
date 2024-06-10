<?php
class Cart
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function getCartDetails($cartItems)
    {
        if (empty($cartItems)) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, count($cartItems), '?'));
        $types = str_repeat('i', count($cartItems));
        $stmt = $this->conn->prepare("SELECT * FROM produkty WHERE id IN ($placeholders)");

        if ($stmt) {
            $stmt->bind_param($types, ...$cartItems);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $products;
        } else {
            error_log("Statement preparation failer: " . $this->conn->error);
            return [];
        }
    }

    public function renderCart($kosikDetailProduktu)
    {
        if (empty($kosikDetailProduktu)) {
            echo '
                <div class="container cart-empty py-5">
                    <h1>Váš košík je prázdny</h1>
                    <a href= "obchod.php">
                        <button class="btn btn-primary btn-lg">
                            Pokračovať v nákupe
                        </button>
                    </a>
                </div>
            ';
        } else {
            echo '<div class="cart-header">
                    <h2>Váš nákupný košík</h2>
                  </div>';
            foreach ($kosikDetailProduktu as $product) {
                echo '<div class="row cart-item">
                <div class="col-md-2">
                    <img src="' . htmlspecialchars($product['image_path']) . '" alt="Obrázok produktu" class="card-image ">
                </div>
 
                <div class="col-md-5">
                    <h5 class="mt-2">' . htmlspecialchars($product['name']) . '</h5>
                </div>
 
                <div class="col-md-3 card-price">
                    <p class="mt-2">' . htmlspecialchars($product['price']) . '</p>
                </div>
 
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm btn-remove mt-2" data-product-id="' . htmlspecialchars($product['id']) . '">Vymazať</button>
                </div>
            </div>';
            }
            echo ' <div class="row">
        <div class="col-12 text-right">
            <h4 class="cart-total">Celková suma: ' . htmlspecialchars(array_sum(array_column($kosikDetailProduktu, 'price'))) . ' €</h4>
        </div>
    </div>';
        }
    }
}
