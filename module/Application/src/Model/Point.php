<?php

namespace Application\Model;

use HseEvents\Database\Connection;
use Application\Registry;
use PDO, PDOException;

class Point implements Model
{
    private ?int $id = null;
    private ?int $eventId;
    private ?string $name;
    private ?string $description;
    private ?bool $isComplex;


    public function __construct(int $eventId, string $name, string $description, bool $isComplex)
    {
        $this->eventId = $eventId;
        $this->name = $name;
        $this->description = $description;
        $this->isComplex = $isComplex;
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

    public function getIsComplex(): string
    {
        return $this->isComplex;
    }

    public function isComplex(): bool {
        return $this->isComplex;
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
