<?php

use HseEvents\View\View;

require_once '../vendor/autoload.php';

ini_set("display_errors", true);
date_default_timezone_set( "Europe/Moscow" );




set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    // Не выбрасываем исключение если ошибка подавлена с
    // помощью оператора @
    if (!error_reporting()) {
        return;
    }

    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});


set_exception_handler(function ($exception) {
    View::getInstance()->renderError($exception);
//    echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
});
