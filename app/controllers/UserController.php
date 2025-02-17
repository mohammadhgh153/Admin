<?php
require_once __DIR__ . "/../models/User.php";

class UserController {
    public function dashboard() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: /login");
            exit;
        }

        $userModel = new User();
        $users = $userModel->getAllUsers();

        require_once __DIR__ . "/../../views/user/dashboard.php";
    }
}
?>
