<?php
namespace HseEvents\Model;

abstract class Model
{
    abstract public static function find(int $id): ?Model;
    abstract public static function findAll(): array;
}

