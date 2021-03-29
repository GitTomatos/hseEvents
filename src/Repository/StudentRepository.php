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


    public function getPoints(int $eventId): array
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

        return $points;
    }


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

        return true;
    }


    public function unregFromEvent(Student $student, int $eventId): bool
    {
        $errors = [];
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
        $errors = array();
        $data = [
            'studentId' => $studentId,
            'pointId' => $pointId,
        ];

        $sql = "INSERT INTO student_point(student_id, point_id) VALUES (:studentId, :pointId)";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);
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
    function getRegedEventPoint(int $studentId): ?Point
    {
        $data = [
            'studentId' => $studentId,
            // 'pointId' => $pointId
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId";

        $conn = $this->pdo;

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $res = $sth->fetch();

        if ($res) {
            $regedPoint = $this->pointRepository->findOneBy(['id' => $res['point_id']]);
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