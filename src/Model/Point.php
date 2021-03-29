<?php

namespace HseEvents\Model;

use HseEvents\Database\Connection;
use HseEvents\Registry;
use PDO, PDOException;

class Point implements Model
{
    private ?int $id = null;
    private ?int $eventId;
    private ?string $name;
    private ?string $description;


    public function __construct(int $eventId, string $name, string $description)
    {
        $this->eventId = $eventId;
        $this->name = $name;
        $this->description = $description;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventId(): int
    {
        return $this->eventId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function getInfo(): array
    {
        $info = array();

        $info['id'] = $this->id;
        $info['eventId'] = $this->eventId;
        $info['name'] = $this->name;
        $info['description'] = $this->description;

        return $info;
    }


}
