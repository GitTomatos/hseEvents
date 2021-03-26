<?php

namespace HseEvents\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use HseEvents\Registry;
use PDO;

interface Model
{
    public function getId(): ?int;
    public function getInfo(): array;
}

