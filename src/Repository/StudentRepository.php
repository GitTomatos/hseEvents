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
    }


    public function checkPassword(Student $stud, string $passToCheck)
    {
        return ($stud->getPassword() === $passToCheck || $stud->getPassword() === md5($passToCheck));
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


//    public function getPoints(int $eventId): array
//    {
//        $sql = "SELECT * FROM student_point WHERE student_id=:studentId";
//
//        $conn = $this->pdo;
//
//        $sth = $conn->prepare($sql);
//        $sth->bindValue(":studentId", $this->id);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $points = array();
//        while ($record = $sth->fetch())
//            $points[] = Point::getById($record['pointId']);
//
//        return $points;
//    }


    public function regToEvent(Student $student, int $eventId): bool
    {

        $isRegistered = $this->isRegedToEvent($student->getId(), $eventId);
//        $isRegistered = $student->isRegedToEvent($eventId);
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

        $eventPoints = $this->pointRepository->findBy(['event_id' => $eventId]);
        foreach ($eventPoints as $point) {
            $this->regToPoint($student->getId(), $point->getId());
        }

        return true;
    }


    public function unregFromEvent(Student $student, int $eventId): bool
    {
        $isRegistered = $this->isRegedToEvent($student->getId(), $eventId);

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

        $eventPoints = $this->pointRepository->findBy(['event_id' => $eventId]);
        foreach ($eventPoints as $point) {
            if ($point->isComplex()) {
                $this->unregFromComplexPoint($student->getId(), $point->getId());
            } else {
                $this->unregFromPoint($student->getId(), $point->getId());
            }
        }

        return true;
    }


    public function isRegedToEvent(int $studentId, int $eventId): bool
    {
        $data = [
            'eventId' => $eventId,
            'studentId' => $studentId,
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


    public function regToPoint(int $studentId, int $pointId): void
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
        ];

        $sql = "INSERT INTO student_point(student_id, point_id) VALUES (:studentId, :pointId)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }


    public function regToComplexPoint(int $studentId, int $pointId, string $pointName): void
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
            'pointName' => $pointName,
        ];

        $sql = "INSERT INTO student_complex_point(student_id, point_id, name)
            VALUES (:studentId, :pointId, :pointName)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

//        $this->regToPoint($studentId, $pointId);
    }


    public function unregFromPoint(int $studentId, int $pointId): void
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId
        ];

        $sql = "DELETE FROM student_point WHERE student_id = :studentId AND point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }


    public function unregFromComplexPoint(int $studentId, int $pointId): void
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
//            'pointName' => $pointName,
        ];

        $sql = "DELETE FROM student_complex_point
                    WHERE student_id=:studentId AND point_id=:pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

//        $this->unregFromPoint($studentId, $pointId);
    }


    public function isRegedToPoint(int $studentId, int $pointId): bool
    {
        $data = [
            'studentId' => $studentId,
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


    public function isRegedToComplexPoint(int $studentId, int $pointId): bool
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
        ];

        $sql = "SELECT * FROM student_complex_point
                    WHERE student_id = :studentId AND point_id = :pointId";

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
    function isRegedToOtherPoints(int $studentId, int $pointId): bool
    {

        $data = [
            'studentId' => $studentId,
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
    function getUnmarkedEventPoints(int $studentId): array
    {
        $data = [
            'studentId' => $studentId,
             'hasMarked' => 0,
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND has_marked = :hasMarked";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $points = [];
        while ($res = $sth->fetch()) {
            $points[] = $this->pointRepository->find($res['point_id']);
        }

        return $points;
    }


    public function getRegedComplexEventPoint(int $studentId, int $pointId): ?Point
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
        ];

        $sql = "SELECT * FROM student_complex_point WHERE student_id = :studentId AND point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $pointData = $sth->fetch();

        if ($pointData) {
            $mainPoint = $this->pointRepository->find($pointId);
            $point = $this->pointRepository->findOneComplexPoint($pointId, $pointData['name']);

            $pointData = [
                'id' => $pointData['point_id'],
                'event_id' => $mainPoint->getEventId(),
                'name' => $pointData['name'],
                'description' => $point->getDescription(),
                'is_complex' => 0,
            ];
            $point = $this->createObject($pointData, Point::class);
            return $point;
        } else {
            return null;
        }
    }


    public function checkIn(int $studentId, int $pointId): void
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
        ];

        $sql = "UPDATE student_point SET has_marked = 1 WHERE student_id = :studentId AND point_id = :pointId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
    }

    public function isCheckedIn(int $studentId, int $pointId): bool
    {
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
            'hasMarked' => true,
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id = :pointId AND has_marked = :hasMarked";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $res = $sth->fetch();

        if ($res)
            return true;
        else
            return false;
    }


//    public function isFullyPassEvent(int $studentId, int $eventId): bool
//    {
//        $data = [
//            'studentId' => $studentId,
//            'eventId' => $eventId,
//            'hasMarked' => true,
//        ];
//
//        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id = :pointId AND has_marked = :hasMarked";
//
//        $conn = $this->pdo;
//
//        $sth = $conn->prepare($sql);
//        $sth->execute($data);
//
//        $res = $sth->fetch();
//
//        if ($res)
//            return true;
//        else
//            return false;
//    }


    public function getModelClassname(): string
    {
        return Student::class;
    }

    public function getTableName(): string
    {
        return "students";
    }
}