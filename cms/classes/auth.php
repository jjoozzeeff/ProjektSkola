<?php
class Auth
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConn();
    }

    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            return 'Please fill in both fields';
        }

        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ?");
        if (!$stmt) {
            return 'Database error: ' . $this->conn->error;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin'] = $user['username'];
            header('Location: objednavky.php');
            exit;
        } else {
            return 'Invalid username or password';
        }
    }
}
