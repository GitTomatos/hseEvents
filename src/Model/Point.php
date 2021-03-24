<?php

namespace HseEvents\Model;

use HseEvents\Database\Connection;
use PDO, PDOException;

class Point extends Model
{
    private ?int $id;
    private ?int $eventId;
    private ?string $name;
    private ?string $description;


    private function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->eventId = $data['eventId'] ?? null;

        $this->name = isset($data['name']) ? filter_var(
            $data['name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;
        $this->description = isset($data['description']) ? filter_var(
            $data['description'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

    }


    public static function validate(array $pointData): ?array
    {
        $errs = array();

        if (is_null($pointData['eventId'])) {
            $errs[] = "Необходимо указать индекс мероприятия!";
        }

        if (is_null($pointData['name'])) {
            $errs[] = "Необходимо указать название!";
        }

        if (!is_null($pointData['eventId']) && !is_null($pointData['name'])) {
            $sql = "SELECT * FROM points WHERE event_id = :eventId AND id = :pointId";

            $sth = Connection::getInstance()->prepare($sql);
            $sth->bindParam(':eventId', $pointData['eventId'], PDO::PARAM_INT);
            $sth->bindParam(':pointId', $pointData['name'], PDO::PARAM_STR);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $event = $sth->fetch();
            if ($event)
                $errs[] = "У этого мероприятия уже есть этап с таким названием!";

        }

        if (is_null($pointData['description'])) {
            $errs[] = "Необходимо указать описание!";
        }

        if (!is_null($pointData['id']) && !is_int($pointData['id'])) {
            $errs[] = "ID должно быть числом!";
        }

        if (empty($errs))
            return null;
        else
            return $errs;

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventId(): ?int
    {
        return $this->eventId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }


    ////////////////////////////////////////////////////////////////
    public static function insert(array $pointData): ?array
    {
        $errors = Point::validate($pointData);
        if (!is_null($errors))
            return $errors;


        if (!is_null($pointData['id']))
            trigger_error("EVENT::insert() : Попытка занести в БД этап с уже установленным id,
             равным id = " . $pointData['id'], E_USER_ERROR);

        $data = [
            "eventId" => $pointData['eventId'],
            "name" => $pointData['name'],
            "description" => $pointData['description']
        ];

        $sql = "INSERT INTO points(event_id, name, description) VALUES (:eventId, :name, :description)";
        $sth = Connection::getInstance()->prepare($sql);
        $sth->execute($data);

        return null;
    }


//    public static function find(int $id): ?Point
//    {
//        $sql = "SELECT * FROM points WHERE id=:id";
//        $sth = Connection::getInstance()->prepare($sql);
//        $sth->bindValue(":id", $id, PDO::PARAM_INT);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $point = $sth->fetch();
//
//        if ($point)
//            return new Point ($point);
//        else
//            return null;
//
//    }


    public static function findAll(): array
    {
        $sql = "SELECT * FROM points WHERE event_id = :eventId";
        $sth = Connection::getInstance()->prepare($sql);
        $sth->execute();

        $points = array();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        while ($point = $sth->fetch()) {
            $points[] = new Point ($point);
        }

        return $points;
    }

    public static function findAllEventPoints($eventId): ?array
    {
        $sql = "SELECT * FROM points WHERE event_id = :eventId";
        $sth = Connection::getInstance()->prepare($sql);
        $sth->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $sth->execute();

        $points = array();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        while ($point = $sth->fetch()) {
            $points[] = new Point ($point);
        }

        if (!empty($points))
            return $points;
        else
            return null;
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

    public static function getTableName(): string {
        return "points";
    }


}
