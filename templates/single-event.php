<?php require_once(INCLUDE_PATH . '/header.php'); ?>

<div class="container">
	<div class='reg-background'>
		<div class="text-center py-5">
			<h1>
				<p>ID мероприятия: <?php echo $current_event->get_id() ?></p>
			</h1>	
			<h1>
				<p> Название: <?php echo $current_event->get_name() ?> </p>
			</h1>
			<p> Описание: <?php echo $current_event->get_description() ?> </p>				
		</div>

		<?php if ( !is_null( $current_user ) ): ?>
			<form action="" method="post">
				<?php if ( !$current_user->is_reged_to_event($current_event->get_id()) ): ?>
					<div class="text-center">
						<button class="reg-button btn btn-primary btn-lg mt-5" name="reg_stud_to_event">Зарегистрироваться</button>
					</div>
					<?php else: ?>
						<div class="text-center">
							<button class="reg-button btn btn-primary btn-lg mt-5" name="unreg_stud_from_event">Отменить регистрацию</button>
						</div>
					<?php endif; ?>
				</form>
			<?php endif; ?>
			
			<p><a href="./?action=view_event_points&event_id=<?php echo $current_event->get_id() ?>">Посмотреть этапы</a></p>	
		</div>
	</div>


	<?php require_once(INCLUDE_PATH . '/footer.php'); ?>
