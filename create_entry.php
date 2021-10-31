<?php require_once 'includes/redirection.php';?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main">
	<h1>Create Entry</h1>

	create new entries. Allow users to enjoy our content.

	<form action="save_entry.php" method="POST">
		<label for="title">Title</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'title') : '';?>
		<input type="text" name="title" />

		<label for="description">description</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'description') : '';?>
		<textarea name="description"></textarea>

		<label for="category">category</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'category') : '';?>
		<select name="category">
		<?php 
			$categories = getCategories($db);
			if(!empty($categories)):
				while($category = mysqli_fetch_assoc($categories)):
		?>
					<option value="<?= $category['id']?>">
						<?= $category['name']?>
					</option>
		<?php
				endwhile;
			endif;
		?>
		</select>

		<input type="submit" value="Save"/>
	</form>
	<?php eraseAlerts();?>
</div><!-- END OF MAIN -->
	

<?php require_once 'includes/footer.php';?>