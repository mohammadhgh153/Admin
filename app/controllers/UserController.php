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
        $search = isset($_GET['search']) ? $_GET['search'] : '';  // دریافت پارامتر جستجو از URL

        // بررسی اگر جستجو انجام شده باشد
        if ($search) {
            $users = $userModel->searchUsers($search);
        } else {
            $users = $userModel->getAllUsers();  // اگر جستجو انجام نشده باشد، همه کاربران نمایش داده می‌شوند
        }

        require_once __DIR__ . "/../../views/user/dashboard.php";  // نمایش ویو
    }

    public function edit($id)
    {
        // بررسی وجود کاربر
        $userModel = new User();
        $user = $userModel->getUserById($id);

        if (!$user) {
            echo "کاربر پیدا نشد!";
            exit;
        }

        // بررسی ارسال فرم
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];

            // به‌روزرسانی اطلاعات کاربر
            if ($userModel->updateUser($id, $name, $email)) {
                header("Location: /dashboard");
                exit;
            } else {
                echo "خطا در به‌روزرسانی اطلاعات!";
            }
        }

        // ارسال داده‌ها به ویو
        require_once __DIR__ . "/../../views/user/edit.php";
    }
}
