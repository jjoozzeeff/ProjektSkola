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
            echo        '<img class="card-img-top" src="' . $row["img"] . '" alt="Card image cap">';
            echo        '<div class="card-body">';
            echo            '<h5 class="card-title">' . $row["Nazov"] . '</h5>';
            echo            '<p class="card-text">' . $row["popis"] . '</p>';
            echo                '<p class="card-text">' . $row["Cena"] . ' €</p>';
            echo            '<a href="?add_to_cart=' . $row["ID"] . '" class="btn btn-success">Kúpiť</a>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';

            $counter++;
        }
        if ($counter > 0) {
            echo '</div>';
        }
    }
}
