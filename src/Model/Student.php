<?php

namespace HseEvents\Model;

use HseEvents\CreateObject;
use HseEvents\Database\Connection;
use HseEvents\Registry;
use PDO, PDOException;
use ReflectionClass;

class Student extends Model
{
    private ?int $id;
    private string $lastName;
    private string $firstName;
    private ?string $patronymic;
    private string $university;
    private string $speciality;
    private int $year;
    private string $phone;
    private string $email;
    private string $password;

    /**
     * Student constructor.
     * @param string $lastName
     * @param string $firstName
     * @param string|null $patronymic
     * @param string $university
     * @param string $speciality
     * @param int $year
     * @param string $phone
     * @param string $email
     * @param string $password
     */
    public function __construct(string $lastName, string $firstName, ?string $patronymic, string $university, string $speciality, int $year, string $phone, string $email, string $password)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->patronymic = $patronymic;
        $this->university = $university;
        $this->speciality = $speciality;
        $this->year = $year;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }


    public static function validate(array $studentData): ?array
    {

        //Добавить валидацию номера по +7 или 8
        //Добавить валидацию почты


        $errs = array();

//        if (is_null($studentData['lastName'])) {
//            $errs[] = "Необходимо указать фамилию!";
//        };
//
//        if (mb_strlen($studentData['lastName']) >= 30) {
//            $errs[] = "Фамилия должна быть не более 30 символов";
//        };
//
//        if (is_null($studentData['firstName'])) {
//            $errs[] = "Необходимо указать имя!";
//        };
//
//        if (mb_strlen($studentData['firstName']) >= 30) {
//            $errs[] = "Имя должно быть не более 30 символов";
//        };
//
//        if (is_null($studentData['university'])) {
//            $errs[] = "Необходимо указать университет!";
//        };
//
//        if (mb_strlen($studentData['university']) >= 30) {
//            $errs[] = "Фамилия должна быть не более 30 символов";
//        };
//
//        if (is_null($studentData['speciality'])) {
//            $errs[] = "Необходимо указать специальность";
//        };
//
//        if (is_null($studentData['year'])) {
//            $errs[] = "Необходимо указать курс";
//        };
//
//        if (is_null($studentData['phone'])) {
//            $errs[] = "Необходимо указать телефон!";
//        } else if (strlen($studentData['phone']) > 12 || strlen($studentData['phone']) < 11) {
//            $errs[] = "Некорректный номер телефона";
//        };
//
//        if (is_null($studentData['email'])) {
//            $errs[] = "Необходимо указать почту!";
//        };
//
//        if (is_null($studentData['password'])) {
//            $errs[] = "Необходимо указать пароль!";
//        }
//
//        if ($studentData['year'] > 5) {
//            $errs[] = "Некорректное число курса!";
//        };
//
//        if (!is_null($studentData['email'])) {
//            $sql = "SELECT * FROM students WHERE email = :email";
//
//            $sth = Connection::getInstance()->prepare($sql);
//            $sth->bindParam(':email', $studentData['email']);
//            $sth->execute();
//
//            $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//            $student = $sth->fetch();
//            if ($student)
//                $errs[] = "Такая почта уже занята!";
//        }

        if (empty($errs)) {
            return null;
        } else {
            return $errs;
        }
    }


    public function insert(): void
    {
        $data = [
            'lastName' => $this->lastName,
            'firstName' => $this->firstName,
            'patronymic' => $this->patronymic,
            'university' => $this->university,
            'speciality' => $this->speciality,
            'year' => $this->year,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => md5($this->password)
        ];

        $sql = "INSERT INTO students (`last_name`, first_name, patronymic, university, speciality, year, phone, email, password) VALUES (:lastName, :firstName, :patronymic, :university, :speciality, :year, :phone, :email, :password)";


        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->execute($data);

//        $this->id = (int)($conn->lastInsertId());
    }


    public static function login(string $email, string $password): array
    {
        $errors = array();

//        $stud = Student::findByEmail($email);
        $stud = Student::findOneBy(["email"=>$email]);
//        dd($stud);
        if (is_null($stud)) {
            $errors['hasError'] = true;
            $errors['errorMessages'][] = "Студент с такой почтой не найден";
            return $errors;
        }

        $isPassCorrect = Student::checkPassword($stud, $password);
        if (!$isPassCorrect) {
            $errors['hasError'] = true;
            $errors['errorMessages'][] = "Неправильный пароль";
            return $errors;
        }

        $errors['hasError'] = false;
        $errors['info'] = $stud->getInfo();
        return $errors;
    }


//    public static function find(int $id): ?Student
//    {
//        $sql = "SELECT * FROM students WHERE id=:id";
//
//        $sth = Connection::getInstance()->prepare($sql);
//        $sth->bindValue(":id", $id);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $stud = $sth->fetch();
//
//        if ($stud) {
//            $student = self::createObject($stud);
//
//            return $student;
//        } else {
//            return null;
//        }
//    }


//    public
//    static function findByEmail(string $email): ?Student
//    {
//        $sql = "SELECT * FROM students WHERE email=:email";
//
//        $sth = Connection::getInstance()->prepare($sql);
//        $sth->bindValue(":email", $email);
//        $sth->execute();
//
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//
//        $stud = $sth->fetch();
////        dd($stud);
//        if ($stud) {
//            return self::createObject($stud);
//        } else {
//            return null;
//        }
//    }


    public
    static function checkPassword(Student $stud, string $passToCheck)
    {
        return ($stud->password == $passToCheck);
    }


    public
    function getEvents(): ?array
    {
        $sql = "SELECT * FROM student_event WHERE student_id=:studentId";

        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->bindValue(":studentId", $this->id);
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_ASSOC);

        $events = array();
        while ($event = $sth->fetch())
            $events[] = Event::find($event['event_id']);

        if (!is_null($events))
            return $events;
        else
            return null;
    }


    public function getPoints(int $eventId): ?array
    {
        $sql = "SELECT * FROM student_point WHERE student_id=:studentId";

        $conn = Registry::get("connection")->getConnection();

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


    public
    function getId(): int
    {
        return $this->id;
    }

    public
    function getEmail(): string
    {
        return $this->email;
    }

    public
    function getLastName(): string
    {
        return $this->lastName;
    }

    public
    function getFirstName(): string
    {
        return $this->firstName;
    }

    public
    function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public
    function getUniversity(): string
    {
        return $this->university;
    }

    public
    function getSpeciality(): string
    {
        return $this->speciality;
    }

    public
    function getYear(): int
    {
        return $this->year;
    }

    public
    function getPhone(): string
    {
        return $this->phone;
    }


    public function regToEvent(int $eventId): bool
    {

        $isRegistered = $this->isRegedToEvent($eventId);
        if ($isRegistered)
            return false;

        $data = [
            'eventId' => $eventId,
            'studentId' => $this->id
        ];

        $sql = "INSERT INTO student_event(student_id, event_id) VALUES (:studentId, :eventId)";

        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        // $errors['hasError'] = true;
        // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
        return true;
    }


    public function unregFromEvent(int $eventId): bool
    {
        $errors = array();
        $isRegistered = $this->isRegedToEvent($eventId);

        if (!$isRegistered)
            return false;

        $data = [
            'eventId' => $eventId,
            'studentId' => $this->id
        ];

        $sql = "DELETE FROM student_event WHERE event_id = :eventId AND student_id = :studentId";

        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        return true;
    }


    public
    function isRegedToEvent(int $eventId): bool
    {
        $data = [
            'eventId' => $eventId,
            'studentId' => $this->id
        ];

        $sql = "SELECT * FROM student_event WHERE event_id = :eventId AND student_id = :studentId";

        $conn = Registry::get("connection")->getConnection();

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
    function regToPoint(int $eventId, int $pointId): ?array
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
            'pointId' => $pointId
        ];

        $sql = "INSERT INTO student_point VALUES (:studentId, :eventId, :pointId)";

        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        // $errors['hasError'] = true;
        // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данный этап";
        return null;
    }


    public
    function unregFromPoint(int $eventId, int $pointId): ?array
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

        $conn = Registry::get("connection")->getConnection();

        $sth = $conn->prepare($sql);
        $sth->execute($data);

        // $errors['hasError'] = true;
        // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
        return null;
    }


    // public function get_reged


    public
    function isRegedToPoint(int $eventId, int $pointId): bool
    {

        $data = [
            'studentId' => $this->id,
            'pointId' => $pointId
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id = :pointId";

        $conn = Registry::get("connection")->getConnection();

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
            'pointId' => $pointId
        ];

        $sql = "SELECT * FROM student_point WHERE student_id = :studentId AND point_id <> :pointId";

        $conn = Registry::get("connection")->getConnection();

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

        $conn = Registry::get("connection")->getConnection();

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


    public
    function getInfo(): array
    {
        $info = array();

        $info['id'] = $this->id;
        $info['lastName'] = $this->lastName;
        $info['firstName'] = $this->firstName;
        $info['patronymic'] = $this->patronymic;
        $info['university'] = $this->university;
        $info['speciality'] = $this->speciality;
        $info['year'] = $this->year;
        $info['phone'] = $this->phone;
        $info['email'] = $this->email;

        return $info;
    }


    protected static function getTableName(): string {
        return "students";
    }


}


?>