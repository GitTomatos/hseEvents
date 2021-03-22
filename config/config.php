<?php
// error_reporting(E_ALL);

use \HseEvents\View\View;

ini_set("display_errors", true);
date_default_timezone_set( "Europe/Moscow" );

define ("DB_DSN", "mysql:host=localhost;dbname=hse_events");
define ("DB_USERNAME", "root");
define ("DB_PASSWORD", "root");
define ("ADMIN_NAME", "admin");
define ("ADMIN_PASS", "pass");

//define ("CLASS_PATH", "../classes/");
//define ("TEMPLATE_PATH", "../templates");
//define ("INCLUDE_PATH",  $_SERVER['DOCUMENT_ROOT'] . "/../templates.includes");
//define ("CONFIG_PATH", "config");


set_error_handler(function ($errno, $errstr, $errfile, $errline ) {
    // Не выбрасываем исключение если ошибка подавлена с 
    // помощью оператора @
    if (!error_reporting()) {
        return;
    }

    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
});


set_exception_handler(function ($exception) {
    (new View("../templates/"))->renderError($exception);
//    echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
});

// function my_error_handler( $exception ){
// 	echo "<p>Проблемы в обработчике</p>";
// 	echo "<p>" . $exception->getMessage() . "</p>";
// }

// set_exception_handler( "my_error_handler" );