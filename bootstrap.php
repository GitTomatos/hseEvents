<?php

use HseEvents\Config;
use HseEvents\Database\Connection;
use HseEvents\Controller\{AccountController,
    CheckInController,
    HomepageController,
    LoginController,
    LogoutController,
    RegistrationController,
    ViewEventController,
    ViewEventPointsController};
use HseEvents\View\TwigView;
use HseEvents\Repository\{StudentRepository, EventRepository, PointRepository};
use HseEvents\View\PhpView;
use HseEvents\Registry;
use Pimple\Container;
use Symfony\Component\HttpFoundation\Session\Session;


require_once __DIR__ . '/vendor/autoload.php';

ini_set("display_errors", true);
error_reporting(E_ALL);

date_default_timezone_set("Europe/Moscow");

$container = new Container();


$container['config'] = function ($c) {
    return new Config(include __DIR__ . '/config/config.php');
};

$container[\Twig\Loader\LoaderInterface::class] = function ($c) {
    return new \Twig\Loader\FilesystemLoader($c['config']['templatePath']);
};

$container['twig'] = function ($c) {
    $twig = new \Twig\Environment($c[\Twig\Loader\LoaderInterface::class], [
        'cache' => $c['config']['twigCachePath'],
        'debug' => true,
    ]);
    return $twig;
};

$container[PhpView::class] = function ($c) {
    return new PhpView($c['config']['templatePath']);
};

$container[TwigView::class] = function ($c) {
    return new TwigView($c['twig']);
};

$container[PDO::class] = function ($c) {
    $configs = $c['config'];
    $pdo = new PDO($configs['dbDsn'], $configs['dbUsername'], $configs['dbPassword']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};


$container[EventRepository::class] = function ($c) {
    return new EventRepository(
        $c[PDO::class],
        $c[PointRepository::class]
    );
};

$container[StudentRepository::class] = function ($c) {
    return new StudentRepository(
        $c[PDO::class],
        $c[EventRepository::class],
        $c[PointRepository::class]
    );
};

$container[PointRepository::class] = function ($c) {
    return new PointRepository($c[PDO::class]);
};

$container[Session::class] = function ($c) {
    return new Session();
};

$container[AccountController::class] = function ($c) {
    return new AccountController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[EventRepository::class],
        $c[PointRepository::class],
        $c[Session::class]
    );
};

$container[CheckInController::class] = function ($c) {
    return new CheckInController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[Session::class]
    );
};

$container[HomepageController::class] = function ($c) {
    return new HomepageController(
//        $c[PhpView::class],
        $c[TwigView::class],
        $c[EventRepository::class],
        $c[Session::class]
    );
};

$container[LoginController::class] = function ($c) {
    return new LoginController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[Session::class]
    );
};

$container[LogoutController::class] = function ($c) {
    return new LogoutController(
        $c[TwigView::class],
        $c[Session::class]
    );
};

$container[RegistrationController::class] = function ($c) {
    return new RegistrationController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[Session::class]
    );
};

$container[ViewEventController::class] = function ($c) {
    return new ViewEventController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[EventRepository::class],
        $c[Session::class]
    );
};

$container[ViewEventPointsController::class] = function ($c) {
    return new ViewEventPointsController(
        $c[TwigView::class],
        $c[StudentRepository::class],
        $c[PointRepository::class],
        $c[Session::class]
    );
};


set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    // Не выбрасываем исключение если ошибка подавлена с
    // помощью оператора @
    if (!error_reporting()) {
        return;
    }

    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});


set_exception_handler(function ($exception) use ($container) {
//    dd(getcwd());
    if (PHP_SAPI === "cli") {
        dump($exception);
    } else {
        echo $container[TwigView::class]->renderError($exception);
    }
//    echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
});


