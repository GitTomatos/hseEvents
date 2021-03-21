<?php

namespace HseEvents\Model;

use PDO, PDOException;

class Student extends Model
{
    private ?int $id = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $patronymic = null;
    private ?string $university = null;
    private ?string $speciality = null;
    private ?int $year = null;
    private ?string $phone = null;
    private ?string $email = null;
    private ?string $password = null;


    private function __construct($data = array())
    {
        $this->id = $data["id"] ?? null;

        $this->lastName = isset($data['last_name']) ? filter_var(
            $data['last_name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->firstName = isset($data['first_name']) ? filter_var(
            $data['first_name'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->patronymic = isset($data['patronymic']) ? filter_var(
            $data['patronymic'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->university = isset($data['university']) ? filter_var(
            $data['university'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->speciality = isset($data['speciality']) ? filter_var(
            $data['speciality'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->year = isset($data['year']) ? filter_var(
            $data['year'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->phone = isset($data['phone']) ? filter_var(
            $data['phone'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->email = isset($data['email']) ? filter_var(
            $data['email'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

        $this->password = isset($data['password']) ? filter_var(
            $data['password'],
            FILTER_SANITIZE_SPECIAL_CHARS
        ) : null;

    }


    public static function validate(array $studentData): ?array
    {

        //Добавить валидацию номера по +7 или 8
        //Добавить валидацию почты


        $errs = array();

        if (is_null($studentData['lastName'])) {
            $errs[] = "Необходимо указать фамилию!";
        };

        if (is_null($studentData['firstName'])) {
            $errs[] = "Необходимо указать имя!";
        };

        if (is_null($studentData['university'])) {
            $errs[] = "Необходимо указать университет!";
        };

        if (is_null($studentData['speciality'])) {
            $errs[] = "Необходимо указать специальность";
        };

        if (is_null($studentData['year'])) {
            $errs[] = "Необходимо указать курс";
        };

        if (is_null($studentData['phone'])) {
            $errs[] = "Необходимо указать телефон!";
        } else if (strlen($studentData['phone']) > 12 || strlen($studentData['phone']) < 11) {
            $errs[] = "Некорректный номер телефона";
        };

        if (is_null($studentData['email'])) {
            $errs[] = "Необходимо указать почту!";
        };

        if (is_null($studentData['password'])) {
            $errs[] = "Необходимо указать пароль!";
        }

        if ($studentData['year'] > 5) {
            $errs[] = "Некорректное число курса!";
        };

        if (!is_null($studentData['email'])) {
            try {
                $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM students WHERE email = :email";

                $sth = $conn->prepare($sql);
                $sth->bindParam(':email', $studentData['email']);
                $sth->execute();

                $sth->setFetchMode(PDO::FETCH_ASSOC);

                $student = $sth->fetch();
                if ($student)
                    $errs[] = "Такая почта уже занята!";

            } catch (PDOException $err) {
                echo $err->getMessage();
            } finally {
                $conn = null;
            }
        }

        if (empty($errs)) {
            return null;
        } else {
            return $errs;
        }
    }


    public static function insert($studentData): ?array
    {
        $errors = Student::validate($studentData);
        if (!is_null($errors)) {
            return $errors;
        }

        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'lastName' => $studentData['lastName'],
                'firstName' => $studentData['firstName'],
                'patronymic' => $studentData['patronymic'],
                'university' => $studentData['university'],
                'speciality' => $studentData['speciality'],
                'year' => $studentData['year'],
                'phone' => $studentData['phone'],
                'email' => $studentData['email'],
                'password' => $studentData['password']
            ];

            $sql = "INSERT INTO students (`last_name`, first_name, patronymic, university, speciality, year, phone, email, password) VALUES (:lastName, :firstName, :patronymic, :university, :speciality, :year, :phone, :email, :password)";

            $sth = $conn->prepare($sql);
            $sth->execute($data);

            return null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }


    public static function login(string $email, string $password): array
    {
        $errors = array();

        $stud = Student::findByEmail($email);

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


    public static function find(int $id): ?Student
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM students WHERE id=:id";

            $sth = $conn->prepare($sql);
            $sth->bindValue(":id", $id);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $stud = $sth->fetch();
            if ($stud)
                return new Student ($stud);
            else
                return null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }

    public static function findAll(): array
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM students";

            $sth = $conn->prepare($sql);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $allStudents = [];
            while ($stud = $sth->fetch())
                $allStudents[] = $stud;

            return $allStudents;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }

    public static function findByEmail(string $email): ?Student
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM students WHERE email=:email";

            $sth = $conn->prepare($sql);
            $sth->bindValue(":email", $email);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $stud = $sth->fetch();
            if ($stud) {
                return new Student ($stud);
            } else {
                return null;
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }


    public static function checkPassword(Student $stud, string $passToCheck)
    {
        return ($stud->password == $passToCheck);
    }


    public function getEvents(): ?array
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM student_event WHERE student_id=:studentId";

            $sth = $conn->prepare($sql);
            $sth->bindValue(":studentId", $this->id);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $events = array();
            while ($event = $sth->fetch())
                $events[] = Event::getById($event['eventId']);

            if (!is_null($events))
                return $events;
            else
                return null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }


    public function getPoints(int $eventId): ?array
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM student_event_point WHERE student_id=:studentId AND event_id = :eventId";

            $sth = $conn->prepare($sql);
            $sth->bindValue(":studentId", $this->id);
            $sth->bindValue(":eventId", $eventId);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $points = array();
            while ($record = $sth->fetch())
                $points[] = Point::getById($record['pointId']);

            if (!is_null($points))
                return $points;
            else
                return null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getUniversity(): string
    {
        return $this->university;
    }

    public function getSpeciality(): string
    {
        return $this->speciality;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }


    public function regToEvent(int $eventId): bool
    {
        $errors = array();
        $isRegistered = $this->isRegedToEvent($eventId);

        if ($isRegistered)
            return false;

        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'eventId' => $eventId,
                'studentId' => $this->id
            ];

            $sql = "INSERT INTO student_event VALUES (:eventId, :studentId)";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            // $errors['hasError'] = true;
            // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
            return true;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function unregFromEvent(int $eventId): bool
    {
        $errors = array();
        $isRegistered = $this->isRegedToEvent($eventId);

        if (!$isRegistered)
            return false;

        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'eventId' => $eventId,
                'studentId' => $this->id
            ];

            $sql = "DELETE FROM student_event WHERE event_id = :eventId AND student_id = :studentId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            return true;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function isRegedToEvent(int $eventId): bool
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'eventId' => $eventId,
                'studentId' => $this->id
            ];

            $sql = "SELECT * FROM student_event WHERE event_id = :eventId AND student_id = :studentId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $res = $sth->fetch();

            if ($res)
                return true;
            else
                return false;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
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

        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'studentId' => $this->id,
                'eventId' => $eventId,
                'pointId' => $pointId
            ];

            $sql = "INSERT INTO student_event_point VALUES (:studentId, :eventId, :pointId)";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            // $errors['hasError'] = true;
            // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данный этап";
            return null;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function unregFromPoint(int $eventId, int $pointId): ?array
    {
        $errors = array();
        $hasRegistered = $this->isRegedToPoint($eventId, $pointId);

        if (!$hasRegistered) {
            $errors[] = "Студент не был зарегистрирован на данный этап";
            return $errors;
        }

        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'studentId' => $this->id,
                'eventId' => $eventId,
                'pointId' => $pointId
            ];

            $sql = "DELETE FROM student_event_point WHERE student_id = :studentId AND event_id = :eventId AND point_id = :pointId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            // $errors['hasError'] = true;
            // $errors['errorMessages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
            return null;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    // public function get_reged


    public function isRegedToPoint(int $eventId, int $pointId): bool
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'studentId' => $this->id,
                'eventId' => $eventId,
                'pointId' => $pointId
            ];

            $sql = "SELECT * FROM student_event_point WHERE student_id = :studentId AND event_id = :eventId AND point_id = :pointId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $res = $sth->fetch();

            if ($res)
                return true;
            else
                return false;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function isRegedToOtherPoints(int $eventId, int $pointId): bool
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'studentId' => $this->id,
                'eventId' => $eventId,
                'pointId' => $pointId
            ];

            $sql = "SELECT * FROM student_event_point WHERE student_id = :studentId AND event_id = :eventId AND point_id <> :pointId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $res = $sth->fetch();

            if ($res)
                return true;
            else
                return false;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function getRegedEventPoint(int $eventId): ?Point
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'studentId' => $this->id,
                'eventId' => $eventId
                // 'pointId' => $pointId
            ];

            $sql = "SELECT * FROM student_event_point WHERE student_id = :studentId AND event_id = :eventId";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $res = $sth->fetch();

            if ($res) {
                $regedPoint = Point::getById($res['pointId']);
                return $regedPoint;
            } else
                return null;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public function getInfo(): array
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


    // public

}


?>