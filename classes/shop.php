<?php
class Shop
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM produkty";
        $result = $this->conn->query($query);

        if ($result === false) {
            error_log("Database query failed: " . $this->conn->error);
            return [];
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function renderProducts($products)
    {
        $counter = 0;
        foreach ($products as $row) {
            if ($counter % 4 == 0) {
                if ($counter > 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }

            echo '<div class ="col-lg-3">';
            echo    '<div class="card" style="width: 18rem;">';
            echo        '<img class="card-img-top" src="' . $row["image_path"] . '" alt="Card image cap">';
            echo        '<div class="card-body">';
            echo            '<h5 class="card-title">' . $row["name"] . '</h5>';
            echo            '<p class="card-text">' . $row["description"] . '</p>';
            echo                '<p class="card-text">' . $row["price"] . ' €</p>';
            echo            '<a href="?add_to_cart=' . $row["id"] . '" class="btn btn-success">Kúpiť</a>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';

            $counter++;
        }
        if ($counter > 0) {
            echo '</div>';
        }
    }

    public function removeFromCart($productId)
    {
        if (isset($_SESSION['cart']) && ($key = array_search($productId, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return true;
        }
        return false;
    }
}
