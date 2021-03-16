<?php 
require_once(INCLUDE_PATH . '/header.php');
require_once (CONFIG_PATH . '/functions.php');
?>



<div class="container">
	<!-- <div class="background-center"> -->
		<div class="reg-background">

			<div class="text-center">
				<h1> Войти в аккаунт </h1>
			</div>

			<?php 
			if ( !empty( $errors ) ){
				foreach ($errors as $error){
					echo "<p>";
					echo $error;
					echo "</p>";
				}
			}
			?>

			<form action="" method="post">
				<div class='login-fields'>
					<input type="text" name="user_login" placeholder="Введите логин" value="<?php echo (isset($_POST['user_login'])) ? $_POST['user_login'] : null ?>">
					<input type="text" name="user_pass" placeholder="Введите пароль" value="<?php echo (isset($_POST['user_pass'])) ? $_POST['user_pass'] : null ?>">
				</div>

				<div class="text-center">
					<button class="reg-button btn btn-primary btn-lg mt-5" type="submit"  name="login" value="Register">Регистрация</button>
				</div>

			</form>

		</div>
		<!-- </div> -->



	</div>


	<?php require_once(INCLUDE_PATH . '/footer.php') ?>