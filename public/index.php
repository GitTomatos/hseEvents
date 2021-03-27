<?php

use \HseEvents\Database\Connection;
use HseEvents\Registry;

session_start();
include __DIR__ . "/../config/config.php";
//include '../config/config.php';
include __DIR__ . '/../bootstrap.php';


$controllerName = '';
$path = '';
if (isset($_SERVER['PATH_INFO'])) {
    $lastSymbol = substr($_SERVER['PATH_INFO'], -1);
    if ($lastSymbol === "/") {
        $path = substr($_SERVER['PATH_INFO'], 0, -1);
    } else {
        $path = $_SERVER['PATH_INFO'];
    }
}

$a = $_SESSION['username'] ?? null;


/*
 * / - HomepageController
 * /home - HomepageController
 * /account - ControllerAccount
 * /login - LoginController
 * /logout - LogoutController
 * /registration - RegistrationController
 * /view-event - ViewEventController
 * /view-event-point - ControllerViewEventPoint
 * /give-error - ControllerGiveError
*/


switch ($path) {
    case '/home':
        $controllerName = 'HseEvents\Controller\HomepageController';
        break;
    case '/account':
        $controllerName = 'HseEvents\Controller\AccountController';
        break;
    case '/login':
        $controllerName = 'HseEvents\Controller\LoginController';
        break;
    case '/logout':
        $controllerName = 'HseEvents\Controller\LogoutController';
        break;
    case '/registration':
        $controllerName = 'HseEvents\Controller\RegistrationController';
        break;
    case '/view-event':
        $controllerName = 'HseEvents\Controller\ViewEventController';
        break;
    case '/view-event-points':
        $controllerName = 'HseEvents\Controller\ViewEventPointsController';
        break;
    case '/give-error':
        $controllerName = 'HseEvents\Controller\ControllerGiveError';
        break;
    default:
//        '/home';
        $controllerName = 'HseEvents\Controller\HomepageController';
}

try {
//    $conn = new Connection();
//    Connection::connectDb();


    /** @var PDO $conn */
    $conn = $container[PDO::class];
//    Connection::getInstance()->beginTransaction();

//    $controller = new $controllerName(Registry::get("view")(Registry::get("config")["templatePath"]));
//    $controller = new $controllerName(Registry::get("container")["view"]);
    $controller = $container[$controllerName];
    echo $controller();
//    dd($controller());

    if ($conn->inTransaction()) {
        $conn->commit();
    }
} catch (Throwable $e) {
    $conn = $container[PDO::class];
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    throw $e;
}