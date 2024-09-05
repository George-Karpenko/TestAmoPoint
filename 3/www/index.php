<?php

use Core\View;
use Database\Migrations\MetricsTable;
use Database\Migrations\UsersTable;
use Database\seeders\UsersTable as SeedersUsersTable;
use Project\Controller\ApiMetricController;
use Project\Controller\AuthController;
use Project\Controller\HomeController;

session_start();

define("DB_HOST", "mysql-db");

define("DB_USER", "db_user");

define("DB_PASS", "password");

define("DB_NAME", "test_database");

$_POST = json_decode(file_get_contents('php://input'), true);

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

$request = $_SERVER['REQUEST_URI'];

spl_autoload_register(function ($class) {
    $class_array = explode("\\", $class);
    $class_name = array_pop($class_array);
    $class_array = array_map('lcfirst', $class_array);
    $class = implode('/', $class_array) . "/" . $class_name;

    if ($class[0] !== '/') {
        include  __DIR__ . '/' . $class . '.php';
        return;
    }
});


switch ($request) {

    case '':
    case '/':
        if (array_key_exists('auth', $_SESSION) && $_SESSION['auth']) {
            $page = (new HomeController)->index();
            echo (new View)->render($page);
            break;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $page = (new AuthController)->auth();
            echo (new View)->render($page);
            break;
        }
        $page = (new AuthController)->login();
        echo (new View)->render($page);
        break;

    case '/?logout':
        if (array_key_exists('auth', $_SESSION)) {
            $_SESSION['auth'] = null;
        }
        redirect('/');
        break;
    case '/?migrate':
        new MetricsTable;
        new UsersTable;
        echo ('Миграция прошла');
        break;

    case '/?seed':
        new SeedersUsersTable;
        echo ('Сиды прошли');
        break;

    case '/?api-metric-save':
        (new ApiMetricController)->save();
        break;
}
