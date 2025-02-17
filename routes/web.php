<?php
require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/UserController.php";

$authController = new AuthController();
$userController = new UserController();

$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/register':
        $authController->register();
        break;
    case '/login':
        $authController->login();
        break;
    case '/logout':
        $authController->logout();
        break;
    case '/dashboard':
        $userController->dashboard();
        break;
    case (preg_match('/^\/edit\/\d+$/', $request) ? $request : null):
        $id = explode('/', $request)[2];  
        $userController->edit($id);
        break;
    default:
        echo "صفحه مورد نظر یافت نشد!";
        break;
}
