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


//    public function delete(int $eventId, $pointId): void {
//        $tableName = $this->getTableName();
//        $conn = $this->pdo;
//
//        $sql = "DELETE FROM $tableName WHERE id = :id";
//        $sth = $conn->prepare($sql);
//        $sth->bindValue(':id', $id);
//        $sth->execute();
//    }


    public function findAllEventPoints(int $eventId): array
    {
        $sql = "SELECT * FROM points WHERE event_id = :eventId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $sth->execute();

        $points = array();

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        while ($pointData = $sth->fetch()) {
            $point = $this->createObject($pointData);
            $points[] = $point;
        }

        return $points;
    }


    public function findComplexPoints(int $pointId): array
    {
        $mainPoint = $this->find($pointId);
        if (!$mainPoint->isComplex()) {
            return [];
        }

        $sql = "SELECT * FROM complex_points WHERE point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":pointId", $pointId, PDO::PARAM_INT);
        $sth->execute();

        $points = array();

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        while ($pointData = $sth->fetch()) {

            $pointData = [
                'id' => $pointData['point_id'],
                'event_id' => $mainPoint->getEventId(),
                'name' => $pointData['name'],
                'description' => $pointData['description'],
                'is_complex' => 0,
            ];
            $point = $this->createObject($pointData);
            $points[] = $point;
        }

        return $points;
    }

    public function findOneComplexPoint(int $pointId, string $pointName): ?Point
    {
        $mainPoint = $this->find($pointId);
        if (!$mainPoint->isComplex()) {
            return null;
        }

        $sql = "SELECT * FROM complex_points WHERE point_id = :pointId AND name = :pointName";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":pointId", $pointId, PDO::PARAM_INT);
        $sth->bindValue(":pointName", $pointName);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $pointData = $sth->fetch();

        if ($pointData) {
            $pointData = [
                'id' => $pointData['point_id'],
                'event_id' => $mainPoint->getEventId(),
                'name' => $pointData['name'],
                'description' => $pointData['description'],
                'is_complex' => 0,
            ];
            $point = $this->createObject($pointData);

            return $point;
        } else {
            return null;
        }
    }

    public function addExtraData(Point $point): Point
    {
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