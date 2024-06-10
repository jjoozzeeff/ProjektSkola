<?php
class ProductManager
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM produkty";
        return $this->db->query($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM produkty WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addProduct($name, $description, $price, $image_path)
    {
        $sql = "INSERT INTO produkty (name, description, price, image_path) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("ssds", $name, $description, $price, $image_path);
        return $stmt->execute();
    }

    public function editProduct($id, $name, $description, $price, $image_path)
    {
        $sql = "UPDATE produkty SET name = ?, description = ?, price = ?, image_path = ? WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("ssdsi", $name, $description, $price, $image_path, $id);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM produkty WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function renderProducts()
    {
        $products = $this->getAllProducts();
        while ($product = $products->fetch_assoc()) {
            $this->renderProductRow($product);
            $this->renderEditModal($product);
        }
    }

    private function renderProductRow($product)
    {
        echo '<tr>
            <td>' . htmlspecialchars($product['id']) . '</td>
            <td>' . htmlspecialchars($product['name']) . '</td>
            <td>' . htmlspecialchars($product['description']) . '</td>
            <td>' . htmlspecialchars($product['price']) . '</td>
            <td>' . htmlspecialchars($product['image_path']) . '</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal' . $product['id'] . '"><i class="fas fa-pen"></i></button>
                <a href="produkty.php?delete=' . $product['id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>';
    }

    private function renderEditModal($product)
    {
        echo '<div class="modal fade" id="editModal' . $product['id'] . '" tabindex="-1" aria-labelledby="editModalLabel' . $product['id'] . '" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel' . $product['id'] . '">Upraviť produkt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="produkty.php">
                        <input type="hidden" name="id" value="' . $product['id'] . '">
                        <div class="form-group">
                            <label for="editProductName">Názov</label>
                            <input type="text" class="form-control" id="editProductName" name="name" value="' . htmlspecialchars($product['name']) . '">
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Popis</label>
                            <input type="text" class="form-control" id="editProductDescription" name="description" value="' . htmlspecialchars($product['description']) . '">
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Cena</label>
                            <input type="number" class="form-control" id="editProductPrice" name="price" value="' . htmlspecialchars($product['price']) . '">
                        </div>
                        <div class="form-group">
                            <label for="editProductImage">Obrázok</label>
                            <input type="text" class="form-control" id="editProductImage" name="image_path" value="' . htmlspecialchars($product['image_path']) . '">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="edit_submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }


    public function renderAddModal()
    {
        echo '<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Pridať produkt</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="produkty.php">
                            <div class="form-group">
                                <label for="addProductName">Názov</label>
                                <input type="text" class="form-control" id="addProductName" name="name">
                            </div>
                            <div class="form-group">
                                <label for="addProductDescription">Popis</label>
                                <input type="text" class="form-control" id="addProductDescription" name="description">
                            </div>
                            <div class="form-group">
                                <label for="addProductPrice">Cena</label>
                                <input type="number" class="form-control" id="addProductPrice" name="price">
                            </div>
                            <div class="form-group">
                                <label for="addProductImage">Obrázok</label>
                                <input type="text" class="form-control" id="addProductImage" name="image_path">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="add_submit">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }
}
