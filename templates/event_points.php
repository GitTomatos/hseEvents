<?php 
if (isset($_POST['reg_stud_to_point'])) {
	$errors = $current_user->reg_to_point($_GET['event_id'], $_POST['point_id']);

	if ( is_null( $errors ) )
		echo "Регистрация прошла успешно";
	else {
		foreach ($errors as $error) {
			echo "<p>";
			echo $error;
			echo "</p>";
		}
	}
}

if ( isset( $_POST['unreg_stud_from_point'] ) ) {
	$errors = $current_user->unreg_from_point($_GET['event_id'], $_POST['point_id']);
	
	if ( is_null( $errors ) )
		echo "Регистрация отменена";
	else {
		foreach ($errors as $error) {
			echo "<p>";
			echo $error;
			echo "</p>";
		}
	}
	
}



?>




<?php require_once(INCLUDE_PATH . '/header.php'); ?>


<div class="container">
	<div class='reg-background'>

		<?php
		if ( !is_null( $current_user ) ) {
			echo "<p>";
			$reged_point = $current_user->get_reged_event_point($_GET['event_id']);
			if ( !is_null( $reged_point ) )
				echo "Зарегистрирован на " . "<a href=''>" . $reged_point->get_name() . "</a>";
					// print_r($reged_point->get_name());
			else
				echo "Не зарегистрирован нигде";
			echo "</p>";
		}
		?>


		<?php if ( !is_null( $points ) ):
			foreach ( $points as $point ): ?>

				<div class="text-center py-5">
					<h1>
						<p>ID этапа: <?php echo $point->get_id() ?></p>
					</h1>
					<h1>
						<p>ID мероприятия: <?php echo $point->get_event_id() ?></p>
					</h1>	
					<h1>
						<p>Название: <?php echo $point->get_name() ?> </p>
					</h1>
					<p>Описание: <?php echo $point->get_description() ?> </p>				
				</div>

				<?php if ( !is_null( $current_user ) ): ?>
					<form action="" method="post">
						<?php if ( !$current_user->is_reged_to_point( $point->get_event_id(), $point->get_id() ) ): ?>
						<div class="text-center">
							<input type="hidden" name="point_id" value="<?php echo $point->get_id() ?>">
							<button class="reg-button btn btn-primary btn-lg" name="reg_stud_to_point">Зарегистрироваться</button>
						</div>
						<?php else: ?>
							<div class="text-center">
								<input type="hidden" name="point_id" value="<?php echo $point->get_id() ?>">
								<button class="reg-button btn btn-primary btn-lg" name="unreg_stud_from_point">Отменить регистрацию</button>
							</div>
						<?php endif; ?>
					</form>
				<?php endif; ?>


				<?php
			endforeach; 
		endif;
		?>

	</div>
</div>


<?php require_once(INCLUDE_PATH . '/footer.php'); ?>