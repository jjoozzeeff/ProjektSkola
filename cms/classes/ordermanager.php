<?php
class OrderManager
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function renderOrdersTable()
    {
        $query = "SELECT * FROM objednavky";
        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">ID objednávky</th>';
            echo '<th scope="col">Meno</th>';
            echo '<th scope="col">Priezvisko</th>';
            echo '<th scope="col">Ulica</th>';
            echo '<th scope="col">Číslo domu</th>';
            echo '<th scope="col">Mesto</th>';
            echo '<th scope="col">Telefónne číslo</th>';
            echo '<th scope="col">Email</th>';
            echo '<th scope="col">Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['meno']) . '</td>';
                echo '<td>' . htmlspecialchars($row['priezvisko']) . '</td>';
                echo '<td>' . htmlspecialchars($row['ulica']) . '</td>';
                echo '<td>' . htmlspecialchars($row['cislo_domu']) . '</td>';
                echo '<td>' . htmlspecialchars($row['mesto']) . '</td>';
                echo '<td>' . htmlspecialchars($row['telefon_cislo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                echo '<td><a href="order-details.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-primary">Otvoriť</a></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No orders found.</p>';
        }
    }
}
