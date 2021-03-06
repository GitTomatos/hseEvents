<?php


namespace Application\Repository;


use Application\CreateObject;
use Application\Model\Event;
use Application\Model\Model;
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


    public function setDiplom(int $studentId, int $eventId) {
        $data = [
            ":studentId" => $studentId,
            ":eventId" => $eventId,
        ];

        $sql = "UPDATE student_event SET has_diplom = 1 WHERE student_id = :studentId AND event_id = :eventId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }


    protected function createObject(array $objData, string $modelClassName = null): Model {
        $object = parent::createObject($objData, $modelClassName);
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