<?php


namespace HseEvents\Repository;


use HseEvents\Model\Point;
use PDO;

class PointRepository extends AbstractRepository
{

    public function insert(Point $point): void
    {
        $data = [
            "eventId" => $point->getEventId(),
            "name" => $point->getName(),
            "description" => $point->getDescription(),
        ];

        $sql = "INSERT INTO points(event_id, name, description) VALUES (:eventId, :name, :description)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }


    public function findAllEventPoints(int $eventId): array
    {
        $sql = "SELECT * FROM points WHERE event_id = :eventId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $sth->execute();

        $points = array();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        while ($point = $sth->fetch()) {
            $points[] = new Point ($point);
        }

        return $points;
    }


    public function addExtraData(Point $point): Point {
        return $point;
    }


    public function getModelClassname(): string
    {
        return Point::class;
    }

    public function getTableName(): string
    {
        return "points";
    }
}