<?php require_once 'includes/redirection.php';?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main">
	<h1>Create Categories</h1>

	create new categories. Allow users to to use this category on their entries.

	<form action="save_category.php" method="POST">
		<label for="name">Name</label>
		<input type="text" name="name" />

		<input type="submit" value="Save"/>
	</form>
	
</div><!-- END OF MAIN -->
	

<?php require_once 'includes/footer.php';?>