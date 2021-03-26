<?php


namespace HseEvents\Repository;


use HseEvents\Model\Event;
use HseEvents\Model\Model;
use HseEvents\Registry;
use PDO;

class EventRepository extends AbstractRepository
{

    public function insert(Event $event): void
    {

        $data = [
            "name" => $event->getName(),
            "description" => $event->getDescription(),
        ];

        $tableName = $this->getTableName();
        $sql = "INSERT INTO $tableName (name, description) VALUES (:name, :description)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }


    public function addExtraData(Event $event): Event
    {
//        $eventPoints = $this->getPoints($event->getId());
//        foreach ($eventPoints as $point) {
//            $event->addPoint($point);
//        }

        return $event;
    }

    public function getModelClassName(): string {
        return Event::class;
    }


    public function getTableName(): string
    {
        return "events";
    }
}