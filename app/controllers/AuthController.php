<?php
require_once __DIR__ . "/../models/User.php";
session_start();

class AuthController
{
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $userModel = new User();
            if ($userModel->createUser($name, $email, $password)) {
                header("Location: /login");
                exit;
            } else {
                echo "خطایی رخ داد!";
            }
        }
        require_once __DIR__ . "/../../views/auth/register.php";
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                header("Location: /dashboard");
                exit;
            } else {
                echo "ایمیل یا رمز عبور اشتباه است!";
            }
        }
        require_once __DIR__ . "/../../views/auth/login.php";
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}
