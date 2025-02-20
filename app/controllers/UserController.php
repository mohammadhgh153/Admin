<?php
require_once __DIR__ . "/../models/User.php";

class UserController
{
    public function dashboard($search = '')
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $userModel = new User();
        $search = isset($_GET['search']) ? $_GET['search'] : '';  

        if ($search) {
            $users = $userModel->searchUsers($search);
        } else {
            $users = $userModel->getAllUsers();  
        }

        require_once __DIR__ . "/../../views/user/dashboard.php"; 
    }

    public function edit($id)
    {
        $userModel = new User();
        $user = $userModel->getUserById($id);
    
        if (!$user) {
            echo "کاربر پیدا نشد!";
            exit;
        }
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $image = $_FILES["image"] ?? null;
    
            if ($userModel->updateUser($id, $name, $email, $image)) {
                header("Location: /dashboard");
                exit;
            } else {
                echo "خطا در به‌روزرسانی اطلاعات!";
            }
        }
    
        require_once __DIR__ . "/../../views/user/edit.php";
    }
    
}
