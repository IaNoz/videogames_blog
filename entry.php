<?php require_once 'includes/conexion.php';?>

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
	
	<h1><?=$current_entry['title']?></h1>
	
	<a href="category.php?id=<?=$current_entry['category_id']?>">
		<h2><?=$current_entry['category']?></h2>
	</a>
	
	<h4><?=$current_entry['date_posted']?></h4>
	
	<p>
		<?=$current_entry['description']?>
	</p>

</div><!-- END OF MAIN -->

<?php require_once 'includes/footer.php';?>