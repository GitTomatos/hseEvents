<?php

namespace HseEvents\Database;

use HseEvents\Registry;
use PDO;

class Connection
{
//    private static ?PDO $instance = null;

    private ?PDO $pdo;

    public function __construct()
    {
        $configs = Registry::get('config')->getConfigs();
        $this->pdo = new PDO($configs['dbDsn'], $configs['dbUsername'], $configs['dbPassword']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function __destruct() {
        $this->pdo = null;
    }

//    public static function getInstance(): PDO{
//        if (is_null(self::$instance)){
////            echo "Вызывается функция " . __FUNCTION__, "<br>";
//            self::$instance = new PDO(Config::getInstance()->dbDsn, Config::getInstance()->dbUsername, Config::getInstance()->dbPassword);
//            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        }
//
//        return self::$instance;
//    }
//
//    public static function close(): void {
//        self::$instance = null;
//    }


}