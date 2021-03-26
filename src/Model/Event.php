<?php

namespace HseEvents\Model;


use HseEvents\Database\Connection;
use HseEvents\Registry;
use PDO, PDOException;

class Event implements Model
{
    private ?int $id = null;
    private string $name;
    private string $description;
    /**
     * @var Point[]
     */
    private array $points;


    /**
     * Event constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function addPoint(Point $point): void {
        $this->points[] = $point;
    }

    /**
     * @return Point[]
     */
    public function getPoints(): array {
        return $this->points;
    }

    public function getInfo(): array
    {
        $info = array();

        $info['id'] = $this->id;
        $info['name'] = $this->name;
        $info['description'] = $this->description;

        return $info;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTableName(): string {
        return "events";
    }

}

