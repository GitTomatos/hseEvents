<?php

use \HseEvents\Database\Connection;
use HseEvents\Registry;
use HseEvents\Http\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Session\Session;


http_response_code(500);


include __DIR__ . "/../config/config.php";
//include '../config/config.php';
include __DIR__ . '/../bootstrap.php';

//session_start();
$session = new Session();
$session->start();

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

$a = $session->get('username') ?? null;
//echo $a;


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
        $controllerName = 'HseEvents\Controller\HomepageController';
}


try {
//    $conn = new Connection();
//    Connection::connectDb();


    /** @var PDO $conn */
    $conn = $container[PDO::class];
//    $request = new Request($_GET, $_POST, $_COOKIE, $_FILES);
    $request = SymfonyRequest::createFromGlobals();
    $controller = $container[$controllerName];
//    dd( $controller);
    $response = $controller($request, $session);
    $response->send();



//    $loader = new \Twig\Loader\ArrayLoader([
//        'index' => $controller(),
//    ]);
//    $twig = new \Twig\Environment($loader);
//
//    echo $twig->render('index');

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