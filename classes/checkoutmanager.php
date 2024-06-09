<?php
class CheckoutManager
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function renderCheckoutForm()
    {
        echo '
        <form method="POST" action="checkout.php">
            <div class="mb-3">
                <label for="meno" class="form-label">Meno</label>
                <input type="text" class="form-control" id="meno" name="meno" required>
            </div>
            <div class="mb-3">
                <label for="priezvisko" class="form-label">Priezvisko</label>
                <input type="text" class="form-control" id="priezvisko" name="priezvisko" required>
            </div>
            <div class="mb-3">
                <label for="ulica" class="form-label">Ulica</label>
                <input type="text" class="form-control" id="ulica" name="ulica" required>
            </div>
            <div class="mb-3">
                <label for="cislo-domu" class="form-label">Číslo domu</label>
                <input type="text" class="form-control" id="cislo-domu" name="cislo-domu" required>
            </div>
            <div class="mb-3">
                <label for="mesto" class="form-label">Mesto</label>
                <input type="text" class="form-control" id="mesto" name="mesto" required>
            </div>
            <div class="mb-3">
                <label for="telefon-cislo" class="form-label">Telefónne číslo</label>
                <input type="text" class="form-control" id="telefon-cislo" name="telefon-cislo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Objednať</button>
        </form>';
    }

    public function handleCheckout($data, $cartItems)
    {
        $this->conn->begin_transaction();

        try {
            $stmt = $this->conn->prepare("
                INSERT INTO objednavky (meno, priezvisko, ulica, cislo_domu, mesto, telefon_cislo, email)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param("sssssss", $data['meno'], $data['priezvisko'], $data['ulica'], $data['cislo-domu'], $data['mesto'], $data['telefon-cislo'], $data['email']);
            $stmt->execute();
            $orderId = $stmt->insert_id;
            $stmt->close();

            $stmt = $this->conn->prepare("
                INSERT INTO produkty_objednavky (objednavka_id, produkt_id)
                VALUES (?, ?)
            ");
            foreach ($cartItems as $productId) {
                $stmt->bind_param("ii", $orderId, $productId);
                $stmt->execute();
            }
            $stmt->close();

            $this->conn->commit();

            header("Location: order-success.php");
            exit;
        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Checkout failed: " . $e->getMessage());
        }
    }
}
