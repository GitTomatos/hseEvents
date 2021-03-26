<?php

use HseEvents\Config;
use HseEvents\Database\Connection;
use HseEvents\Controller\{AccountController,
    HomepageController,
    LoginController,
    LogoutController,
    RegistrationController,
    ViewEventController,
    ViewEventPointsController};
use HseEvents\Repository\{StudentRepository, EventRepository, PointRepository};
use HseEvents\View\View;
use HseEvents\Registry;
use Pimple\Container;


require_once __DIR__ . '/vendor/autoload.php';

ini_set("display_errors", true);
date_default_timezone_set("Europe/Moscow");

$container = new Container();


$container['config'] = function ($c) {
    return new Config(include __DIR__ . '/config/config.php');
};

$container[View::class] = function ($c) {
    return new View($c['config']['templatePath']);
};

$container[PDO::class] = function ($c) {
    $configs = $c['config'];
    $pdo = new PDO($configs['dbDsn'], $configs['dbUsername'], $configs['dbPassword']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};


$container[EventRepository::class] = function ($c) {
    return new EventRepository($c[PDO::class]);
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


$container[AccountController::class] = function ($c) {
    return new AccountController(
        $c[View::class],
        $c[StudentRepository::class],
        $c[EventRepository::class]
    );
};

$container[HomepageController::class] = function ($c) {
    return new HomepageController(
        $c[View::class],
        $c[EventRepository::class]
    );
};

$container[LoginController::class] = function ($c) {
    return new LoginController(
        $c[View::class],
        $c[StudentRepository::class]
    );
};

$container[LogoutController::class] = function ($c) {
    return new LogoutController($c[View::class]);
};

$container[RegistrationController::class] = function ($c) {
    return new RegistrationController(
        $c[View::class],
        $c[StudentRepository::class]
    );
};

$container[ViewEventController::class] = function ($c) {
    return new ViewEventController(
        $c[View::class],
        $c[StudentRepository::class],
        $c[EventRepository::class]
    );
};

$container[ViewEventPointsController::class] = function ($c) {
    return new ViewEventPointsController(
        $c[View::class],
        $c[StudentRepository::class],
        $c[PointRepository::class]
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
        $container[View::class]->renderError($exception);
    }
//    echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
});


