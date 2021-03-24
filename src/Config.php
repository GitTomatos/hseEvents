<?php

namespace HseEvents;

use ArrayAccess;

class Config implements ArrayAccess
{
//    private static ?Config $instance = null;
    private array $configs;


    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    public function getConfigs(): array
    {
        return $this->configs;
    }

//    public static function getInstance()
//    {
//        if (is_null(self::$instance)) {
//            self::$instance = new Config(include __DIR__ . '/../config/config.php');
//        }
//
//        return self::$instance;
//    }
//
//    public function __get($name)
//    {
//        if (array_key_exists($name, $this->configs)) {
//            return $this->configs[$name];
//        }
//
//        return null;
//    }
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->configs);
    }

    public function offsetGet($offset)
    {
        return $this->configs[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->configs[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->configs[$offset]);
    }
}