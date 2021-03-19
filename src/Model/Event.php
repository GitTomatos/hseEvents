<?php

namespace HseEvents\Model;


use PDO;

class Event extends Model
{
    private $id = null;
    private $name = null;
    private $description = null;


    public function __construct($data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->description = isset($data['description']) ? $data['description'] : null;
    }


    public function validate()
    {
        $errs = array();

        if (is_null($this->name)) {
            $errs[] = "Необходимо указать название!";
        } else {
            try {
                $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM events WHERE name = :name";

                $sth = $conn->prepare($sql);
                $sth->bindParam(':name', $this->name, PDO::PARAM_STR);
                $sth->execute();

                $sth->setFetchMode(PDO::FETCH_ASSOC);

                $event = $sth->fetch();
                if ($event)
                    $errs[] = "Мероприятие с таким названием уже есть!";

            } catch (PDOException $err) {
                echo $err->getMessage();
            } finally {
                $conn = null;
            }
        }

        if (is_null($this->description)) {
            $errs[] = "Необходимо указать описание!";
        }

        if (!is_null($this->id) && !is_int($this->id)) {
            $errs[] = "ID должно быть числом!";
        }

        if (empty($errs))
            return null;
        else
            return $errs;

    }


    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_description()
    {
        return $this->description;
    }


    public function insert()
    {
        $errors = $this->validate();
        if (!is_null($errors))
            return $errors;


        if (!is_null($this->id))
            trigger_error("EVENT::insert() : Попытка занести в БД событие с уже установленным id, равным id = $this->id", E_USER_ERROR);
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                "name" => $this->name,
                "description" => $this->description
            ];

            $sql = "INSERT INTO events(name, description) VALUES (:name, :description)";
            $sth = $conn->prepare($sql);
            $sth->execute($data);

        } catch (\PDOException $err) {
            echo $err->getMessage();
        } finally {
            $conn = null;
        }
    }


    public static function find($id): ?Event
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM events WHERE id=:id";
            $sth = $conn->prepare($sql);
            $sth->bindValue(":id", $id, PDO::PARAM_INT);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $event = $sth->fetch();

            if ($event)
                return new Event ($event);
            else
                return null;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public static function findByEmail(?string $email): ?Event
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM events WHERE email=:email";
            $sth = $conn->prepare($sql);
            $sth->bindValue(":email", $email, PDO::PARAM_INT);
            $sth->execute();

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $event = $sth->fetch();

            if ($event)
                return new Event ($event);
            else
                return null;

        } catch (\PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    public static function findAll(): array
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM events";
            $sth = $conn->query($sql);

            $events = [];

            $sth->setFetchMode(PDO::FETCH_ASSOC);

            while ($event = $sth->fetch()) {
                $events[] = new Event ($event);
            }

            return $events;

        } catch (PDOException $err) {
            print_r($err);
        } finally {
            $conn = null;
        }
    }


    // public function reg_student_to_event( $student_id ) {
    // 	$errors = array();
    // 	$has_registered = $this->is_student_registered( $student_id );

    // 	if ( $has_registered )
    // 		return false;

    // 	try{
    // 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    // 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // 		$data = [
    // 			'event_id' => $this->id,
    // 			'student_id' => $student_id
    // 		];

    // 		$sql = "INSERT INTO event_student VALUES (:event_id, :student_id)";
    // 		$sth = $conn->prepare($sql);
    // 		$sth->execute($data);

    // 		$errors['has_error'] = true;
    // 		$errors['error_messages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
    // 		return true;

    // 	} catch ( PDOException $err ) {
    // 		print_r( $err );
    // 	} finally {
    // 		$conn = null;
    // 	}
    // }


    // public function unreg_student_from_event( $student_id ) {
    // 	$errors = array();
    // 	$has_registered = $this->is_student_registered( $student_id );

    // 	if ( !$has_registered )
    // 		return false;

    // 	try{
    // 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    // 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // 		$data = [
    // 			'event_id' => $this->id,
    // 			'student_id' => $student_id
    // 		];

    // 		$sql = "DELETE FROM event_student WHERE event_id = :event_id AND student_id = :student_id";
    // 		$sth = $conn->prepare($sql);
    // 		$sth->execute($data);

    // 		$errors['has_error'] = true;
    // 		$errors['error_messages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
    // 		return true;

    // 	} catch ( PDOException $err ) {
    // 		print_r( $err );
    // 	} finally {
    // 		$conn = null;
    // 	}
    // }


    // public function is_student_registered ( $student_id ) {
    // 	try{
    // 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    // 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // 		$data = [
    // 			'event_id' => $this->id,
    // 			'student_id' => $student_id
    // 		];

    // 		$sql = "SELECT * FROM event_student WHERE event_id = :event_id AND student_id = :student_id";
    // 		$sth = $conn->prepare($sql);
    // 		$sth->execute($data);

    // 		$res = $sth->fetch();

    // 		if ( $res )
    // 			return true;
    // 		else
    // 			return false;

    // 	} catch ( PDOException $err ) {
    // 		print_r( $err );
    // 	} finally {
    // 		$conn = null;
    // 	}
    // }


    public function get_info()
    {
        $info = array();

        $info['id'] = $this->id;
        $info['name'] = $this->name;
        $info['description'] = $this->description;

        return $info;
    }


}

?>