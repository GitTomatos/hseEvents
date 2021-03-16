<?php 
require_once(INCLUDE_PATH . '/header.php');
// require_once('config/db_connection.php');
?>

<div class="container">
	<div class='reg-background'>

		<div class="text-center">
			<h1> Мероприятия</h1>
		</div>
		<table class="event-table mt-5">
			<thead>
				<tr>
					<th>Название мероприятия</th>			
					<th>Описание</th>
				</tr>	
			</thead>
			<tbody>
				<?php 
				$events = Event::get_all_events();
				// print_r($events);
				// $events = get_events();
				if (!empty($events)){
					foreach ($events as $event) {
						?>
						<tr>
							<td> <a href="./?action=view_event&event_id= <?php echo $event->get_id() ?> "> <?php echo $event->get_name() ?> </a> </td>
							<td> <?php echo $event->get_description() ?> </td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>

		</table>
	</div>


</div>


<?php require_once(INCLUDE_PATH . '/footer.php') ?>
