<?php require_once 'includes/redirection.php';?>

<?php require_once 'includes/conection.php';?>

<?php require_once 'includes/helpers.php';?>

<?php 
		$current_entry = getEntry($db, $_GET['id']);

		if(!isset($current_entry['id'])){
			header("Location: index.php");
		}
?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main">
	<h1>Edit Entry</h1>

	Edit your entry: <?=$current_entry['title']?>.

	<form action="actions/save_entry.php?edit=<?=$current_entry['id']?>" method="POST">

		<label for="title">Title</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'title') : '';?>
		<input type="text" name="title" value="<?=$current_entry['title']?>"/>

		<label for="description">description</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'description') : '';?>
		<textarea name="description"><?=$current_entry['description']?></textarea>

		<label for="category">category</label>
		<?= isset($_SESSION['errors_entry']) ? showErrors($_SESSION['errors_entry'], 'category') : '';?>
		<select name="category" >
		<?php 
			$categories = getCategories($db);
			if(!empty($categories)):
				while($category = mysqli_fetch_assoc($categories)):
		?>
					<option value="<?= $category['id']?>"
					<?= ($category['id'] == $current_entry['category_id']) ? 'selected' : ''?>
					>
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