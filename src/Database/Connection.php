<?php

namespace HseEvents\Database;

use HseEvents\Config;
use PDO;

class Connection
{
    private static ?PDO $instance = null;


    public static function getInstance(): PDO{
        if (is_null(self::$instance)){
//            echo "Вызывается функция " . __FUNCTION__, "<br>";
            self::$instance = new PDO(Config::getInstance()->dbDsn, Config::getInstance()->dbUsername, Config::getInstance()->dbPassword);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }


}