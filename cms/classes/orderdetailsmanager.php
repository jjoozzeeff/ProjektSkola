<?php
class OrderDetailsManager
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function renderOrderDetails($orderId)
    {
        $orderDetails = $this->getOrderDetails($orderId);

        $query = "SELECT meno, priezvisko, ulica, cislo_domu, mesto, telefon_cislo, email, datum_objednavky FROM objednavky WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();
            $orderInfo = $result->fetch_assoc();
            $stmt->close();
        }

        echo '<div class="container py-5">';
        echo '<h1>Order Details</h1>';
        echo '<h2>Order ID: ' . htmlspecialchars($orderId) . '</h2>';
        echo '<h3>Order Date: ' . htmlspecialchars($orderInfo['datum_objednavky']) . '</h3>';
        echo '<h3>Customer Details:</h3>';
        echo '<p>Name: ' . htmlspecialchars($orderInfo['meno'] . ' ' . $orderInfo['priezvisko']) . '</p>';
        echo '<p>Address: ' . htmlspecialchars($orderInfo['ulica'] . ' ' . $orderInfo['cislo_domu'] . ', ' . $orderInfo['mesto']) . '</p>';
        echo '<p>Phone Number: ' . htmlspecialchars($orderInfo['telefon_cislo']) . '</p>';
        echo '<p>Email: ' . htmlspecialchars($orderInfo['email']) . '</p>';

        if (!empty($orderDetails)) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Product ID</th>';
            echo '<th scope="col">Name</th>';
            echo '<th scope="col">Price</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($orderDetails as $product) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($product['id']) . '</td>';
                echo '<td>' . htmlspecialchars($product['name']) . '</td>';
                echo '<td>' . htmlspecialchars($product['price']) . ' €</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No products found for this order.</p>';
        }

        echo '<a href="objednavky.php" class="btn btn-secondary">Naspäť</a>';
        echo '</div>';
    }

    private function getOrderDetails($orderId)
    {
        $orderDetails = [];
        $query = "SELECT p.* FROM produkty p INNER JOIN produkty_objednavky po ON p.id = po.produkt_id WHERE po.objednavka_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $orderId);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $orderDetails[] = $row;
            }

            $stmt->close();
        }

        return $orderDetails;
    }
}
