<?php 

class Point {
	private $id = null;	
	private $event_id = null;	
	private $name = null;	
	private $description = null;


	public function __construct( $data ){
		$this->id = isset( $data['id'] ) ? $data['id'] : null;
		$this->event_id = isset( $data['event_id'] ) ? $data['event_id'] : null;
		$this->name = isset( $data['name'] ) ? $data['name'] : null;
		$this->description = isset( $data['description'] ) ? $data['description'] : null;
	}


	public function validate() {
		$errs = array();

		if ( is_null( $this->event_id ) ) {
			$errs[] = "Необходимо указать индекс мероприятия!";
		}

		if ( is_null( $this->name ) ) {
			$errs[] = "Необходимо указать название!";
		} 

		if ( !is_null( $this->event_id ) && !is_null( $this->name ) ) {
			try {
				$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = "SELECT * FROM event_points WHERE event_id = :event_id AND name = :name";

				$sth = $conn->prepare($sql);
				$sth->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
				$sth->bindParam(':name', $this->name, PDO::PARAM_STR);
				$sth->execute();

				$sth->setFetchMode(PDO::FETCH_ASSOC);
				
				$event = $sth->fetch();
				if ( $event )
					$errs[] = "У этого мероприятия уже есть этап с таким названием!";

			} catch ( PDOException $err ) {
				echo $err->getMessage();
			} finally {
				$conn = null;
			}
		}

		if ( is_null( $this->description ) ) {
			$errs[] = "Необходимо указать описание!";
		}

		if ( !is_null($this->id) && !is_int($this->id) ) {
			$errs[] = "ID должно быть числом!";
		}

		if ( empty( $errs ) )
			return null;
		else
			return $errs;

	}


	public function get_id() {
		return $this->id;
	}

	public function get_event_id() {
		return $this->event_id;
	}

	public function get_name() {
		return $this->name;
	}

	public function get_description() {
		return $this->description;
	}


	public function insert(){
		$errors = $this->validate();
		if ( !is_null( $errors ) )
			return $errors;


		if (!is_null($this->id))
			trigger_error( "EVENT::insert() : Попытка занести в БД этап с уже установленным id, равным id = $this->id", E_USER_ERROR );
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$data = [
				"event_id" => $this->event_id,
				"name" => $this->name,
				"description" => $this->description
			];

			$sql = "INSERT INTO event_points(event_id, name, description) VALUES (:event_id, :name, :description)";
			$sth = $conn->prepare($sql);
			$sth->execute($data);

		} catch (PDOException $err) {
			echo $err->getMessage();
		} finally {
			$conn = null;
		}
	}


	public static function get_by_id( $id ){
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = "SELECT * FROM event_points WHERE id=:id";
			$sth = $conn->prepare($sql);
			$sth->bindValue( ":id", $id, PDO::PARAM_INT );
			$sth->execute();
			
			$sth->setFetchMode(PDO::FETCH_ASSOC);

			$point = $sth->fetch();

			if ( $point )
				return new Point ( $point );
			else
				return false;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}



	public static function get_all_event_points( $event_id ) {
		try{
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = "SELECT * FROM event_points WHERE event_id = :event_id";
			$sth = $conn->prepare($sql);
			$sth->bindValue(":event_id", $event_id, PDO::PARAM_INT);
			$sth->execute();

			$points = array();

			$sth->setFetchMode(PDO::FETCH_ASSOC);
			
			while($point = $sth->fetch()){
				$points[] = new Point ($point);
			}

			if ( !empty( $points ) )
				return $points;
			else
				return null;

		} catch ( PDOException $err ) {
			print_r( $err );
		} finally {
			$conn = null;
		}
	}


	// public function reg_student( $student_id ) {
	// 	$errors = array();
	// 	$has_registered = $this->is_student_registered( $student_id );

	// 	if ( $has_registered )
	// 		return false;

	// 	try{
	// 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	// 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// 		$data = [
	// 			'student_id' => $student_id,
	// 			'event_id' => $this->event_id,
	// 			'point_id' => $this->id
	// 		];

	// 		$sql = "INSERT INTO student_event_point VALUES (:student_id, :event_id, :point_id)";
	// 		$sth = $conn->prepare($sql);
	// 		$sth->execute($data);

	// 		$errors['has_error'] = true;
	// 		$errors['error_messages'][] = "Такой студент уже зарегистрирован на данный этап";
	// 		return true;

	// 	} catch ( PDOException $err ) {
	// 		print_r( $err );
	// 	} finally {
	// 		$conn = null;
	// 	}
	// }


	// public function unreg_student( $student_id ) {
	// 	$errors = array();
	// 	$has_registered = $this->is_student_registered( $student_id );

	// 	if ( !$has_registered )
	// 		return false;

	// 	try{
	// 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	// 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// 		$data = [
	// 			'student_id' => $student_id,
	// 			'event_id' => $this->event_id,
	// 			'point_id' => $this->id
	// 		];

	// 		$sql = "DELETE FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id AND point_id = :point_id";
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
	// 			'student_id' => $student_id,
	// 			'event_id' => $this->event_id,
	// 			'point_id' => $this->id
	// 		];

	// 		$sql = "SELECT * FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id AND point_id = :point_id";
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


	// public function is_stud_reged_to_any_point ( $student_id ) {
	// 	try{
	// 		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	// 		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// 		$data = [
	// 			'student_id' => $student_id,
	// 			'event_id' => $this->event_id,
	// 			'point_id' => $this->id
	// 		];

	// 		$sql = "SELECT * FROM student_event_point WHERE student_id = :student_id AND event_id = :event_id";
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


	public function get_info() {
		$info = array();

		$info['id'] = $this->id;
		$info['event_id'] = $this->event_id;
		$info['name'] = $this->name;
		$info['description'] = $this->description;

		return $info;
	}


}

?>
