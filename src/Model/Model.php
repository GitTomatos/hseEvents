<?php
namespace HseEvents\Model;

abstract class Model
{
    abstract static public function find($id): ?Model;
    abstract static public function findAll(): array;
}

