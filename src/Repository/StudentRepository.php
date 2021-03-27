<?php


namespace HseEvents\Repository;


use HseEvents\Model\{Event, Model, Student, Point};
use HseEvents\CreateObject;
use HseEvents\Registry;
use PDO;

class StudentRepository extends AbstractRepository
{

    private EventRepository $eventRepository;
    private PointRepository $pointRepository;

    public function __construct(PDO $pdo, EventRepository $eventRepository, PointRepository $pointRepository)
    {
        parent::__construct($pdo);
        $this->eventRepository = $eventRepository;
        $this->pointRepository = $pointRepository;
    }

    public function addExtraData(Student $student): Student
    {
        $studEvents = $this->getEvents($student->getId());
        foreach ($studEvents as $event) {
            $student->addEvent($event);
        }

        return $student;
    }

//    public function find(int $id): ?Model
//    {
//        $tableName = $this->getTableName();
//        $sql = "SELECT * FROM $tableName WHERE id=:id";
//
//        $conn = $this->pdo;
//        $sth = $conn->prepare($sql);
//        $sth->bindValue(":id", $id);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $objData = $sth->fetch();
//
//
//        if ($objData) {
//            $student = (new createObject())($this->getModelClassname(), $objData);
//            $studEvents = $this->getEvents($student->getId());
//            foreach ($studEvents as $event) {
//                $student->addEvent($event);
//            }
//        } else {
//            return null;
//        }
//    }

    public function insert(Student $student): void
    {
        $data = [
            'lastName' => $student->getLastName(),
            'firstName' => $student->getFirstName(),
            'patronymic' => $student->getPatronymic(),
            'university' => $student->getUniversity(),
            'speciality' => $student->getSpeciality(),
            'year' => $student->getYear(),
            'phone' => $student->getPhone(),
            'email' => $student->getEmail(),
            'password' => $student->getPassword(),
        ];

        $sql = "INSERT INTO students (
                      last_name, 
                      first_name, 
                      patronymic, 
                      university, 
                      speciality, 
                      year, 
                      phone, 
                      email, 
                      password
                      ) VALUES (
                                :lastName, 
                                :firstName, 
                                :patronymic, 
                                :university, 
                                :speciality, 
                                :year, 
                                :phone, 
                                :email, 
                                :password
                                )";


        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

//        $this->id = (int)($conn->lastInsertId());
    }


    public function login(string $email, string $password): array
    {
        $errors = array();

        $stud = $this->findOneBy(["email" => $email]);
        if (is_null($stud)) {
            $errors['hasError'] = true;
            $errors['errorMessages'][] = "Студент с такой почтой не найден";
            return $errors;
        }

        $isPassCorrect = $this->checkPassword($stud, $password);
        if (!$isPassCorrect) {
            $errors['hasError'] = true;
            $errors['errorMessages'][] = "Неправильный пароль";
            return $errors;
        }

        $errors['hasError'] = false;
        $errors['info'] = $stud->getInfo();
        return $errors;
    }


    public function checkPassword(Student $stud, string $passToCheck)
    {
        return ($stud->getPassword() == $passToCheck);
    }


    public function getEvents(int $studentId): array
    {
        $sql = "SELECT * FROM student_event WHERE student_id=:studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":studentId", $studentId);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $events = [];
        while ($event = $sth->fetch()) {
            $events[] = $this->eventRepository->find($event['event_id']);
        }
        return $events;
    }


    public function getPoints(int $eventId): ?array
    {
        $sql = "SELECT * FROM student_point WHERE student_id=:studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->bindValue(":studentId", $this->id);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $points = array();
        while ($record = $sth->fetch())
            $points[] = Point::getById($record['pointId']);

        if (!is_null($points))
            return $points;
        else
            return null;
    }


    public function regToEvent(Student $student, int $eventId): bool
    {

//        $isRegistered = $this->isRegedToEvent($eventId);
        $isRegistered = $student->isRegedToEvent($eventId);
        if ($isRegistered)
            return false;

        $data = [
            'eventId' => $eventId,
            'studentId' => $student->getId(),
        ];

        $sql = "INSERT INTO student_event(student_id, event_id) VALUES (:studentId, :eventId)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $student->addEvent($this->eventRepository->find($eventId));

        return true;
    }


    public function unregFromEvent(Student &$student, int $eventId): bool
    {
        $errors = [];
        $isRegistered = $student->isRegedToEvent($eventId);

        if (!$isRegistered)
            return false;

        $data = [
            'eventId' => $eventId,
            'studentId' => $student->getId(),
        ];

        $sql = "DELETE FROM student_event WHERE event_id = :eventId AND student_id = :studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $student->removeEvent($eventId);

        return true;
    }


    public function isRegedToEvent(int $eventId): bool
    {
        $data = [
            'eventId' => $eventId,
            'studentId' => $this->id,
        ];

        $sql = "SELECT * FROM student_event WHERE event_id = :eventId AND student_id = :studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $res = $sth->fetch();

        if ($res)
            return true;
        else
            return false;
    }


    public function regToPoint(int $eventId, int $pointId): ?array
    {
        $errors = array();
        $isRegedToThis = $this->isRegedToPoint($eventId, $pointId);

        if ($isRegedToThis) {
            $errors[] = "Студент уже зарегистрирован на данный этап";
            return $errors;
        }

        $isRegedToOthers = $this->isRegedToOtherPoints($eventId, $pointId);

        if ($isRegedToOthers) {
            $regedPoint = $this->getRegedEventPoint($eventId);
            $errors[] = "Студент уже зарегистрирован на другой этап: " . $regedPoint->getName();
            return $errors;
        }


        $data = [
            'studentId' => $this->id,
            'eventId' => $eventId,
            'pointId' => $pointId,
        ];

        $sql = "INSERT INTO student_point VALUES (:studentId, :eventId, :pointId)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        return null;
    }


    public function unregFromPoint(int $eventId, int $pointId): ?array
    {
        $errors = array();
        $hasRegistered = $this->isRegedToPoint($eventId, $pointId);

        if (!$hasRegistered) {
            $errors[] = "Студент не был зарегистрирован на данный этап";
            return $errors;
        }


        $data = [
            'studentId' => $this->id,
            'pointId' => $pointId
        ];

        $sql = "DELETE FROM student_point WHERE student_id = :studentId AND point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        return null;
    }


    public function isRegedToPoint(int $eventId, int $pointId): bool
    {

        $data = [
            'studentId' => $this->id,
            'pointId' => $pointId,
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $res = $sth->fetch();

        if ($res)
            return true;
        else
            return false;
    }


    public
    function isRegedToOtherPoints(int $eventId, int $pointId): bool
    {

        $data = [
            'studentId' => $this->id,
            'pointId' => $pointId,
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id <> :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $res = $sth->fetch();

        if ($res)
            return true;
        else
            return false;
    }


    public
    function getRegedEventPoint(int $eventId): ?Point
    {
        $data = [
            'studentId' => $this->id,
            // 'pointId' => $pointId
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $res = $sth->fetch();

        if ($res) {
            $regedPoint = Point::getById($res['pointId']);
            return $regedPoint;
        } else
            return null;
    }


    public function getModelClassname(): string
    {
        return Student::class;
    }

    public function getTableName(): string
    {
        return "students";
    }
}