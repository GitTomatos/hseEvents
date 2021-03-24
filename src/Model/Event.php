<?php

namespace HseEvents\Model;


use HseEvents\Database\Connection;
use PDO, PDOException;

class Event extends Model
{
    private ?int $id;
    private ?string $name;
    private ?string $description;

//    private static ?PDO $conn = new Conn;

    private function __construct(array $eventData)
    {
        $this->id = $eventData['id'] ?? null;
        $this->name = isset($eventData['name']) ? filter_var(
            $eventData['name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;
        $this->description = isset($eventData['description']) ? filter_var(
            $eventData['description'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;
    }


    public static function validate(array $eventData): ?array
    {
        $errs = array();

        if (is_null($eventData['name'])) {
            $errs[] = "Необходимо указать название!";
        } else {
            $sql = "SELECT * FROM events WHERE name = :name";

            $sth = Connection::getInstance()->prepare($sql);
            $sth->bindParam(':name', $eventData['name']);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $event = $sth->fetch();
            if ($event)
                $errs[] = "Мероприятие с таким названием уже есть!";
        }

        if (is_null($eventData['description'])) {
            $errs[] = "Необходимо указать описание!";
        }

//        if (isset($eventData['id']) && !is_int($eventData['id'])) {
//            $errs[] = "ID должно быть числом!";
//        }

        if (empty($errs))
            return null;
        else
            return $errs;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }


    public static function insert(array $eventData): ?array
    {
        $errors = Event::validate($eventData);
        if (!is_null($errors))
            return $errors;


        if (isset($eventData['id']))
            trigger_error("EVENT::insert() : Попытка занести в БД событие с уже установленным id, 
            равным id =" . $eventData["id"], E_USER_ERROR);

        $data = [
            "name" => $eventData['name'],
            "description" => $eventData['description']
        ];

        $sql = "INSERT INTO events(name, description) VALUES (:name, :description)";
        $sth = Connection::getInstance()->prepare($sql);
        $sth->execute($data);

        return null;


    }


//    public static function find(int $id): ?Event
//    {
//        $sql = "SELECT * FROM events WHERE id=:id";
//        $sth = Connection::getInstance()->prepare($sql);
//        $sth->bindValue(":id", $id, PDO::PARAM_INT);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $event = $sth->fetch();
//
//        if ($event)
//            return new Event ($event);
//        else
//            return null;
//    }

    protected static function getTableName(): string {
        return "events";
    }

}

