<?php


namespace HseEvents;


abstract class Registry
{

    /**
     * this introduces global state in your application which can not be mocked up for testing
     * and is therefor considered an anti-pattern! Use dependency injection instead!
     *
     * @var Service[]
     */
//    private static ?Registry $instance = null;
    private static array $objects = [];


//    private function __construct() {
//
//    }
//    public static function instanced: self
//    {
//        if (is_null(self::$instance)) {
//            self::$instance = new self();
//        }
//        return self::$instance;
//    }

    public static function set(string $key, object $value)
    {
        self::$objects[$key] = $value;
    }

    public static function get(string $key): Service
    {
        if (!in_array($key, self::$objects) || !isset(self::$objects[$key])) {
            throw new InvalidArgumentException('Invalid key given');
        }

        return self::$objects[$key];
    }


    public static function getConnection() {
        if (!array_key_exists("connection", self::$services) or is_null(self::$services['connection'])) {
            self::$services['connection'] = new PDO(
                Config::getInstance()->dbDsn,
                Config::getInstance()->dbUsername,
                Config::getInstance()->dbPassword
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$services['connection'];
    }
}