<?php
require_once(INCLUDE_PATH . '/header.php');
// require_once('config/db_connection.php');
?>


<div class="container d-flex align-items-center">
	<div class="reg-background">
		<div class="reg-text text-center">
			<h1> Регистрация</h1>				
		</div>



		<?php 
		
		if ( !is_null( $validation_errors ) ) {
			echo "<div class='form-errors'>";
			foreach ($validation_errors as $err_num => $err_descript) {
				echo "<p class='from-error'>";
				echo $err_descript;
				echo "</p>";
			}
			echo "</div>";
		}


	?>	


	<form method="post" action="" >

		<div class="reg-fields">

			<input type="text" name="last_name" placeholder="Фамилия*:" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : null ?>" >
			<input type="text" name="first_name" placeholder="Имя*:" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : null ?>" >
			<input type="text" name="patronymic" placeholder="Отчество:" value="<?php echo isset($_POST['patronymic']) ? $_POST['patronymic'] : null ?>" >
			<input type="text" name="university" placeholder="Вуз*:" value="<?php echo isset($_POST['university']) ? $_POST['university'] : null ?>" >
			<input type="text" name="speciality" placeholder="Специальность:" value="<?php echo isset($_POST['speciality']) ? $_POST['speciality'] : null ?>" >
			<input type="number" name="study_year" placeholder="Курс:" value="<?php echo isset($_POST['study_year']) ? $_POST['study_year'] : null ?>" >
			<input type="text" name="phone" placeholder="Телефон*:" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : null ?>" >
			<input type="text" name="email" placeholder="Почта*:" value="<?php echo isset($_POST['email']) ? $_POST['email'] : null ?>" >
			<input type="text" name="pass" placeholder="Пароль*:" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : null ?>" >

		</div>

		<div class="form-check mt-5">
			<input class="form-check-input" type="checkbox" name="pers_info_handling" id="pers_info_handling">
			<label for="pers_info_handling">
				Согласен(на) на обработку персональных данных
			</label>
		</div>



		<div class="text-center">
			<button class="reg-button btn btn-primary btn-lg mt-5" type="submit"  name="add_student" value="Register">Регистрация</button>
		</div>

	</form>

</div>



</div>




<?php require_once(INCLUDE_PATH . '/footer.php'); ?>