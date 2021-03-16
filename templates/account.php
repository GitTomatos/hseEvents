<?php 
if(isset($_POST['read_qr'])){
	require_once (get_template_directory() . "/qr/qr-decoder.php");
	$res = decode_qr();
	echo "Результат: " . $res;
}


$validation_errors = null;

if ( isset( $_POST['add_event'] ) ) {
	global $validation_errors;

	require_once (CLASS_PATH . "/Event.php");
	$data = array();

	$data['name'] = !empty($_POST['event_name']) ? $_POST['event_name'] : null;
	$data['description'] = !empty($_POST['event_description']) ? $_POST['event_description'] : null;

	$new_event = new Event( $data );
	$validation_errors = $new_event->insert();
	if ( is_null( $validation_errors ) )
		header("Location: ./");
}

?>




<?php 
require_once(INCLUDE_PATH . '/header.php');
?>


<div class="container">
	<div class="my-info">

		<p class="text-center">
			ID: <?php echo !is_null($current_user->get_id()) ? $current_user->get_id() : "Не указано" ?>
		</p>
		<p class="text-center">
			Email: <?php echo !is_null($current_user->get_email()) ? $current_user->get_email() : "Не указано" ?>
		</p>
		<p class="text-center">
			Фамилия: <?php echo !is_null($current_user->get_last_name()) ? $current_user->get_last_name() : "Не указано" ?>
		</p>
		<p class="text-center">
			Имя: <?php echo !is_null($current_user->get_first_name()) ? $current_user->get_first_name() : "Не указано" ?>
		</p>
		<p class="text-center">
			Отчество: <?php echo !is_null($current_user->get_patronymic()) ? $current_user->get_patronymic() : "Не указано" ?>
		</p>
		<p class="text-center">
			Университет: <?php echo !is_null($current_user->get_university()) ? $current_user->get_university() : "Не указано" ?>
		</p>
		<p class="text-center">
			Специальность: <?php echo !is_null($current_user->get_speciality()) ? $current_user->get_speciality() : "Не указано" ?>
		</p>
		<p class="text-center">
			Курс: <?php echo !is_null($current_user->get_year()) ? $current_user->get_year() : "Не указано" ?>
		</p>
		<p class="text-center">
			Телефон: <?php echo !is_null($current_user->get_phone()) ? $current_user->get_phone() : "Не указано" ?>
		</p>
	</div>
	
	<div class="after-info">
		<div class="my-events">
			<p>Мои мероприятия:</p>
			<?php
			$user_events = $current_user->get_events();
			if ( !is_null( $user_events ) ):
				foreach ($user_events as $event):
					echo "<p>";
					echo "<a href='./?action=view_event&event_id=" . $event->get_id() . "'>";
					echo $event->get_name();
					echo "</a>";
					echo "</p>";
				endforeach;	
			endif;

			?>
		</div>
		<div class="my-qr">
			<?php $img_src = ('https://api.qrserver.com/v1/create-qr-code/?data=' . $current_user->get_id() . '&size=150x150') ?>
			<img src="<?php echo $img_src ?>" alt="qr-code"/>
		</div>
	</div>

	

	<div class='qr-decoder'>
		<form enctype="multipart/form-data" action="" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			Расшифровать QR-код: <input name="file" type="file" />
			<input type="submit" name="read_qr" value="Read QR code" />
		</form>
	</div>
	

	<div>

		<?php 
		if ( !empty( $validation_errors ) ) {
			echo "<div class='form-errors'>";
			foreach ($validation_errors as $err_num => $err_descript) {
				echo "<p class='from-error'>";
				echo $err_descript;
				echo "</p>";
			}
			echo "</div>";
		}
		?>

		<form action="" method="post">
			<div class='login-fields'>
				<input type="text" name="event_name" placeholder="Название мероприятия" value="<?php echo isset($_POST['event_name']) ? $_POST['event_name'] : null ?>" >
				<input type="text" name="event_description" placeholder="Описание мероприятия" value="<?php echo isset($_POST['event_description']) ? $_POST['event_description'] : null ?>" >
			</div>
			<div class="text-center">
				<button class="reg-button btn btn-primary btn-lg mt-5" type="submit" name="add_event">Добавить мероприятие</button>
			</div>
		</form>
	</div>

</div>


<?php require_once(INCLUDE_PATH . '/footer.php') ?>