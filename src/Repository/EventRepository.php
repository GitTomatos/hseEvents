<?php


namespace HseEvents\Repository;


use HseEvents\CreateObject;
use HseEvents\Model\Event;
use HseEvents\Model\Model;
use HseEvents\Registry;
use PDO;

class EventRepository extends AbstractRepository
{

    private PointRepository $pointRepository;

    public function __construct(PDO $pdo, PointRepository $pointRepository)
    {
        parent::__construct($pdo);
        $this->pointRepository = $pointRepository;
    }

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



    protected function createObject(array $objData): Model {
        $object = parent::createObject($objData);
        $eventPoints = $this->pointRepository->findBy([
            'event_id' => $object->getId()
        ]);
        foreach ($eventPoints as $point) {
            $object->addPoint($point);
        }

        return $object;
    }

    public function getModelClassName(): string {
        return Event::class;
    }


    public function getTableName(): string
    {
        return "events";
    }
}