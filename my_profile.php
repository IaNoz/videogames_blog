<?php require_once 'includes/redirection.php';?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main">
	<h1>My profile</h1>
	<p>edit profile data</p>

	<!-- MOSTRAR ERRORES -->
			<?php if(isset($_SESSION['completed'])):?>

				<div class="alert alert-success"><?= $_SESSION['completed'];?></div>

			<?php elseif(isset($_SESSION['errors'])):?>

				<?= showErrors($_SESSION['errors'], 'general');?>

			<?php endif;?>

			<form action="user_update.php" method="POST">
				
				<label for="name">Name</label>
				<?= isset($_SESSION['errors']) ? 
					showErrors($_SESSION['errors'], 'name') : 
					'';	?>
				<input 	type="text" 
						name="name" 
						value="<?=$_SESSION['user']['name']?>" />
				
				<label for="surname">Surname</label>
				<?= isset($_SESSION['errors']) ? 
					showErrors($_SESSION['errors'], 'surname') : 
					'';	?>
				<input 	type="text" 
						name="surname" 
						value="<?=$_SESSION['user']['surname']?>" />
				
				<label for="email">Email</label>
				<?= isset($_SESSION['errors']) ?
					showErrors($_SESSION['errors'], 'email') : 
					'';	?>
				<input 	type="email" 
						name="email" 
						value="<?=$_SESSION['user']['email']?>" />
				
				<input 	type="submit" 
						name="signup" 
						value="save" 
						value="<?=$_SESSION['user']['name']?>"	/>
			</form>
	<?php eraseAlerts();?>
</div><!-- END OF MAIN -->
	

<?php require_once 'includes/footer.php';?>