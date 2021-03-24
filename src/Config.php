<?php

namespace HseEvents;

class Config
{
    private static ?Config $instance = null;
    private array $configs;


    private function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Config(include __DIR__ . '/../config/config.php');
        }

        return self::$instance;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->configs)) {
            return $this->configs[$name];
        }

        return null;
    }
}