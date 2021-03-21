<?php
// error_reporting(E_ALL);
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


// function my_error_handler( $exception ){
// 	echo "<p>Проблемы в обработчике</p>";
// 	echo "<p>" . $exception->getMessage() . "</p>";
// }

// set_exception_handler( "my_error_handler" );