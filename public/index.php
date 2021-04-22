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
$session = $container[Session::class];
$session->start();

if (is_null($session->get('username'))) {
    $session->set('userPermission', 1);
}




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

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/home[/]', 'HseEvents\Controller\HomepageController');
    $r->addRoute('GET', '/', 'HseEvents\Controller\HomepageController');
    $r->addRoute(['GET', 'POST'], '/account[/]', 'HseEvents\Controller\AccountController');
    $r->addRoute(['GET', 'POST'], '/login[/]', 'HseEvents\Controller\LoginController');
    $r->addRoute('GET', '/logout[/]', 'HseEvents\Controller\LogoutController');
    $r->addRoute(['GET', 'POST'], '/registration[/]', 'HseEvents\Controller\RegistrationController');
//    $r->addRoute('GET', '/view-event[/]', 'HseEvents\Controller\ViewEventController');
    $r->addRoute(['GET', 'POST'], '/view-event/{eventId:\d+}[/]', 'HseEvents\Controller\ViewEventController');
    $r->addRoute('GET', '/view-event-points[/]', 'HseEvents\Controller\ViewEventPointsController');
    $r->addRoute(['GET', 'POST'], '/view-event-points/{eventId:\d+}[/]', 'HseEvents\Controller\ViewEventPointsController');
    $r->addRoute('GET', '/view-complex-event-points[/]', 'HseEvents\Controller\ViewComplexEventPointsController');
    $r->addRoute(['GET', 'POST'], '/view-complex-event-points/{pointId:\d+}[/]', 'HseEvents\Controller\ViewComplexEventPointsController');
    $r->addRoute('GET', '/check-in-to-point/{studentId:\d+}/{pointId:\d+}[/]', 'HseEvents\Controller\CheckInController');
    $r->addRoute('GET', '/get-diplom/{studentId:\d+}/{eventId:\d+}[/]', 'HseEvents\Controller\GetDiplomController');
    $r->addRoute('GET', '/give-error[/]', 'HseEvents\Controller\ControllerGiveError');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
//dump($uri);

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
//dump($routeInfo);
//dump($routeInfo);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
//        die("hello");
        $controllerName = $routeInfo[1];
        $vars = $routeInfo[2];
        $conn = $container[PDO::class];
        $request = SymfonyRequest::createFromGlobals();
        foreach ($vars as $name => $value){
            $request->attributes->set($name, $value);
        }
        $controller = $container[$controllerName];
        $response = $controller($request, $session);
        $response->send();
        break;
}
die();

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