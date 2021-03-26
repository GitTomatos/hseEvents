<?php

namespace HseEvents;

use ArrayAccess;

class Config implements ArrayAccess
{
    private array $configs;


    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }


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