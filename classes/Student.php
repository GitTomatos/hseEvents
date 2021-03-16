<?php 

class Student{
	private $id = null;
	private $last_name = null;
	private $first_name = null;
	private $patronymic = null;
	private $university = null;
	private $speciality = null;
	private $year = null;
	private $phone = null;
	private $email = null;
	private $password = null;


	public function __construct( $data=array() ) {
		$this->id = isset($data["id"]) ? $data["id"] : null;
		$this->last_name = isset($data["last_name"]) ? $data["last_name"] : null;
		$this->first_name = isset($data["first_name"]) ? $data["first_name"] : null;
		$this->patronymic = isset($data["patronymic"]) ? $data["patronymic"] : null;
		$this->university = isset($data["university"]) ? $data["university"] : null;
		$this->speciality = isset($data["speciality"]) ? $data["speciality"] : null;
		$this->year = isset($data["year"]) ? $data["year"] : null;
		$this->phone = isset($data["phone"]) ? $data["phone"] : null;
		$this->email = isset($data["email"]) ? $data["email"] : null;
		$this->password = isset($data["password"]) ? $data["password"] : null;
	}



	public function validate() {

		//Добавить валидацию номера по +7 или 8
		//Добавить валидацию почты


		$errs = array();

		if ( is_null( $this->last_name ) ) {
			$errs[] = "Необходимо указать фамилию!";
		};

		if ( is_null( $this->first_name ) ){
			$errs[] = "Необходимо указать имя!";
		};

		if ( is_null( $this->university ) ) {
			$errs[] = "Необходимо указать университет!";
		};

		if ( is_null( $this->speciality ) ) {
			$errs[] = "Необходимо указать специальность";
		};

		if ( is_null( $this->year ) ) {
			$errs[] = "Необходимо указать курс";
		};

		if ( is_null( $this->phone ) ){
			$errs[] = "Необходимо указать телефон!";
		} else if ( strlen($this->phone) > 12 || strlen($this->phone) < 11 ){
			$errs[] = "Некорректный номер телефона";
		};

		if ( is_null( $this->email ) ){
			$errs[] = "Необходимо указать почту!";
		};

		if ( is_null( $this->password ) ){
			$errs[] = "Необходимо указать пароль!";
		}
		
		if ( $this->year > 5 ) {
			$errs[] = "Некорректное число курса!";
		};

		if ( !is_null($this->email) ) {
			try {
				$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = "SELECT * FROM students WHERE email = :email";

				$sth = $conn->prepare($sql);
				$sth->bindParam(':email', $this->email, PDO::PARAM_STR);
				$sth->execute();

				$sth->setFetchMode(PDO::FETCH_ASSOC);
				
				$student = $sth->fetch();
				if ( $student )
					$errs[] = "Такая почта уже занята!";

			} catch ( PDOException $err ) {
				echo $err->getMessage();
			} finally {
				$conn = null;
			}
		}

		if ( empty($errs) ) {
			if ( !isset($this->id) )
				$this->id = null;
			return null;
		} else {
			return $errs;
		}
	}


	public function insert() {
		$errors = $this->validate();
		if ( !is_null( $errors ) ) {
			return $errors;
		}

		try{
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'last_name' => $this->last_name,
				'first_name' => $this->first_name,
				'patronymic' => $this->patronymic,
				'university' => $this->university,
				'speciality' => $this->speciality,
				'year' => $this->year,
				'phone' => $this->phone,
				'email' => $this->email,
				'password' => $this->password
			];

			$sql = "INSERT INTO students (last_name, first_name, patronymic, university, speciality, year, phone, email, password) VALUES (:last_name, :first_name, :patronymic, :university, :speciality, :year, :phone, :email, :password)";

			$sth = $conn->prepare($sql);
			$sth->execute($data);

			return null;
		} catch ( PDOException $err ) {
			echo $err->getMessage();
		} finally {
			$conn = null;
		}
	}


	public static function login( $email, $password ) {
		$errors = array();

		$stud = Student::find_by_email( $email );

		if ( is_null( $stud ) ) {
			$errors['has_error'] = true;
			$errors['error_messages'][] = "Студент с такой почтой не найден";
			return $errors;
		}

		$is_pass_correct = Student::check_password( $stud, $password );
		if ( !$is_pass_correct ) {
			$errors['has_error'] = true;
			$errors['error_messages'][] = "Неправильный пароль";
			return $errors;
		}

		$errors['has_error'] = false;
		$errors['info'] = $stud->get_info();
		return $errors;
	}


	public static function find_by_email( $email ) {
		try{
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = "SELECT * FROM students WHERE email=:email";

			$sth = $conn->prepare($sql);
			$sth->bindValue(":email", $email);
			$sth->execute();

			$sth->setFetchMode(PDO::FETCH_ASSOC);

			$stud = $sth->fetch();
			if ( $stud ) 
				return new Student ( $stud );
			else
				return null;
		} catch ( PDOException $err ) {
			echo $err->getMessage();
		} finally {
			$conn = null;
		}
	}


	public static function check_password(Student $stud, $pass_to_check) {
		return ($stud->password == $pass_to_check);
	}


	public function get_events() {
		try{
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = "SELECT * FROM event_student WHERE student_id=:student_id";

			$sth = $conn->prepare($sql);
			$sth->bindValue(":student_id", $this->id);
			$sth->execute();

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$events = array();
			while ( $event = $sth->fetch() )
				$events[] = Event::get_by_id( $event['event_id'] );
			
			if ( !is_null($events) ) 
				return $events;
			else
				return null;
		} catch ( PDOException $err ) {
			echo $err->getMessage();
		} finally {
			$conn = null;
		}
	}


	public function get_points( $event_id ) {
		try{
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = "SELECT * FROM student_event_point WHERE student_id=:student_id AND event_id = :event_id";

			$sth = $conn->prepare($sql);
			$sth->bindValue(":student_id", $this->id);
			$sth->bindValue(":event_id", $event_id);
			$sth->execute();

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$points = array();
			while ( $record = $sth->fetch() )
				$points[] = Point::get_by_id( $record['point_id'] );
			
			if ( !is_null($points) ) 
				return $points;
			else
				return null;
		} catch ( PDOException $err ) {
			echo $err->getMessage();
		} finally {
			$conn = null;
		}
	}


	public function get_id() {
		return $this->id;
	}

	public function get_email() {
		return $this->email;
	}

	public function get_last_name() {
		return $this->last_name;
	}

	public function get_first_name() {
		return $this->first_name;
	}

	public function get_patronymic() {
		return $this->patronymic;
	}

	public function get_university() {
		return $this->university;
	}

	public function get_speciality() {
		return $this->speciality;
	}

	public function get_year() {
		return $this->year;
	}

	public function get_phone() {
		return $this->phone;
	}


	public function reg_to_event( $event_id ) {
		$errors = array();
		$is_registered = $this->is_reged_to_event( $event_id );

		if ( $is_registered )
			return false;

		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'event_id' => $event_id,
				'student_id' => $this->id
			];

			$sql = "INSERT INTO event_student VALUES (:event_id, :student_id)";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			// $errors['has_error'] = true;
			// $errors['error_messages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
			return true;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}


	public function unreg_from_event( $event_id ) {
		$errors = array();
		$is_registered = $this->is_reged_to_event( $event_id );

		if ( !$is_registered )
			return false;

		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'event_id' => $event_id,
				'student_id' => $this->id
			];

			$sql = "DELETE FROM event_student WHERE event_id = :event_id AND student_id = :student_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			return true;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}



	public function is_reged_to_event ( $event_id ) {
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'event_id' => $event_id,
				'student_id' => $this->id
			];

			$sql = "SELECT * FROM event_student WHERE event_id = :event_id AND student_id = :student_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$res = $sth->fetch();

			if ( $res )
				return true;
			else
				return false;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}



	public function reg_to_point( $event_id, $point_id ) {
		$errors = array();
		$is_reged_to_this = $this->is_reged_to_point( $event_id, $point_id );

		if ( $is_reged_to_this ) {
			$errors[] = "Студент уже зарегистрирован на данный этап";
			return $errors;
		}

		$is_reged_to_others = $this->is_reged_to_other_points ( $event_id, $point_id );

		if ( $is_reged_to_others ) {
			$reged_point = $this->get_reged_event_point( $event_id );
			$errors[] = "Студент уже зарегистрирован на другой этап: " . $reged_point->get_name();
			return $errors;
		}

		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'student_id' => $this->id,
				'event_id' => $event_id,
				'point_id' => $point_id
			];

			$sql = "INSERT INTO student_event_point VALUES (:student_id, :event_id, :point_id)";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			// $errors['has_error'] = true;
			// $errors['error_messages'][] = "Такой студент уже зарегистрирован на данный этап";
			return null;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}



	public function unreg_from_point( $event_id, $point_id ) {
		$errors = array();
		$has_registered = $this->is_reged_to_point( $event_id, $point_id );

		if ( !$has_registered ) {
			$errors[] = "Студент не был зарегистрирован на данный этап";
			return $errors;
		}

		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'student_id' => $this->id,
				'event_id' => $event_id,
				'point_id' => $point_id
			];

			$sql = "DELETE FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id AND point_id = :point_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			// $errors['has_error'] = true;
			// $errors['error_messages'][] = "Такой студент уже зарегистрирован на данное мероприятие";
			return null;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}



	// public function get_reged


	public function is_reged_to_point ( $event_id, $point_id ) {
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'student_id' => $this->id,
				'event_id' => $event_id,
				'point_id' => $point_id
			];

			$sql = "SELECT * FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id AND point_id = :point_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$res = $sth->fetch();

			if ( $res )
				return true;
			else
				return false;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}




	public function is_reged_to_other_points ( $event_id, $point_id ) {
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'student_id' => $this->id,
				'event_id' => $event_id,
				'point_id' => $point_id
			];

			$sql = "SELECT * FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id AND point_id <> :point_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$res = $sth->fetch();

			if ( $res )
				return true;
			else
				return false;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}


	public function get_reged_event_point( $event_id ) {
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				'student_id' => $this->id,
				'event_id' => $event_id
				// 'point_id' => $point_id
			];

			$sql = "SELECT * FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			$res = $sth->fetch();

			if ( $res ){
				$reged_point = Point::get_by_id ( $res['point_id'] );
				return $reged_point;
			} else
			return null;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}


	public function get_info() {
		$info = array();

		$info['id'] = $this->id;
		$info['last_name'] = $this->last_name;
		$info['first_name'] = $this->first_name;
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