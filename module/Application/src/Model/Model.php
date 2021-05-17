<?php

namespace Application\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use Application\Registry;
use PDO;

interface Model
{
    public function getId(): ?int;
    public function getInfo(): array;
}

