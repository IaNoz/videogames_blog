<!-- BARRA LATERAL -->
<aside id="sidebar">

<!-- ____________________ SEARCH BAR ________________________________ -->
	
	<div id="search" class="block-aside">
			
		<h3>Search</h3>

		<form action="actions/search.php" method="POST">
			<input type="text" name="search" />
			<input type="submit" name="Search" value="search"/>
		</form>
	</div>
<!--///////////////////// END SEARCH BAR ///////////////////////////// -->


<!-- ____________________ USER OPTIONS BAR _________________________ -->
	
	<?php if(isset($_SESSION['user'])):?>
		<div id="user-logged" class="block-aside">
			<h3><?=$_SESSION['user']['name'].' '.$_SESSION['user']['surname'];?></h3>
			<!-- buttons-->
			<a href="create_entry.php" class="button button-green">Create entry</a>
			<a href="create_category.php" class="button">Create Category</a>
			<a href="my_profile.php" class="button button-orange">My profile</a>
			<a href="actions/close_session.php" class="button button-red">Log out</a>
		</div>
	<?php endif;?>
<!-- ///////////////////// END USER OPTIONS BAR ///////////////////// -->


	
	<?php if(!isset($_SESSION['user'])):?>

<!-- ____________________ LOGIN ________________________________ -->

		<div id="login" class="block-aside">
			<h3>Login</h3>

			<?php if(isset($_SESSION['error_login'])):?>
			<div id="user-logged" class="alert alert-error">
				<?=$_SESSION['error_login'];?>
			</div>
			<?php endif;?>

			<form action="actions/login.php" method="POST">
				<label for="email">Email</label>
				<input type="email" name="email" />
				<label for="password">Password</label>
				<input type="password" name="password" />
				<input type="submit" name="login" value="login"/>
			</form>
		</div>
<!-- ///////////////////// END LOGIN ///////////////////// -->
		

<!-- ____________________ SIGNUP ________________________________ -->

		<div id="signup" class="block-aside">
			<h3>Sign up</h3>

			<!-- MOSTRAR ERRORES -->
			<?php if(isset($_SESSION['completed'])):?>
			
				<div class="alert alert-success"><?= $_SESSION['completed'];?></div>
			
			<?php elseif(isset($SESSION['errors'])):?>
			
				<?= showErrors($_SESSION['errors'], 'general');?>
			
			<?php endif;?>
			
			<form action="actions/signup.php" method="POST">
			
				<label for="name">Name</label>
				<?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';?>
				<input type="text" name="name" />
			
				<label for="surname">Surname</label>
				<?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'surname') : '';?>
				<input type="text" name="surname" />
			
				<label for="email">Email</label>
				<?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '';?>
				<input type="email" name="email" />
			
				<label for="password">Password</label>
				<?= isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : '';?>
				<input type="password" name="password" />
			
				<input type="submit" name="signup" value="signup"/>
			
			</form>
			<?php eraseAlerts();?>
		</div>
<!-- ///////////////////// END SIGNUP ///////////////////// -->
	
	<?php endif;?>

</aside>