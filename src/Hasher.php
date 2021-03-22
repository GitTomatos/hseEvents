<?php


namespace HseEvents;


class Hasher
{

    private static ?Hasher $instance = null;

    public static function getInstance(): Hasher
    {
        if (is_null(self::$instance)){
            self::$instance = new Hasher();
        }

        return self::$instance;
    }

    public static function hash(string $strToHash, bool $binary = false): string
    {
        return md5($strToHash, $binary);
    }
}