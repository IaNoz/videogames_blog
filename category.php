<?php require_once 'includes/conection.php';?>

<?php require_once 'includes/helpers.php';?>

<?php 
		$current_category = getCategory($db, $_GET['id']);

		if(!isset($current_category['id'])){
			header("Location: index.php");
		}
?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!-- CAJA PRINCIPAL -->
<div id="main">
	
	<h1>Entries of <?=$current_category['name']?></h1>

	<?php 
		$entries = getEntries($db, null, $_GET['id']);
		if(!empty($entries) && mysqli_num_rows($entries) >= 1):

			while($entry = mysqli_fetch_assoc($entries)):
	?>
				<article class="entry">

					<a href="entry.php?id=<?=$entry['id']?>">
						<h2><?=$entry['title'];?></h2>
						<span class="date"><?=$entry['category']." | ".$entry['date_posted'];?></span>
						<p>
							<?= substr($entry['description'], 0, 250)."...";?>
						</p>
					</a>
				</article>
	<?php	
			endwhile;
		else:
	?>
			<div class="alert">There are no entries for this category</div>
	<?php 
		endif; 
	?>
</div><!-- END OF MAIN -->
	

<?php require_once 'includes/footer.php';?>