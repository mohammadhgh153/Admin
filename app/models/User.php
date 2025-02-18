<?php
require_once __DIR__ . "/../../config/database.php";

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function createUser($name, $email, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateUser($id, $name, $email, $image = null)
{
    $imagePath = null;

    // اگر تصویری انتخاب شده است
    if ($image && $image['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], __DIR__ . "/../../public/" . $imagePath);
    }

    $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, image = ? WHERE id = ?");
    return $stmt->execute([$name, $email, $imagePath ? $imagePath : null, $id]);
}


    public function searchUsers($search)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?");
        $searchTerm = "%" . $search . "%"; 
        $stmt->execute([$searchTerm, $searchTerm]);
        return $stmt->fetchAll();
    }
}
