<?php 
	if(!isset($_POST['search'])){
		header("Location: index.php");
	}
?>

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>


<!-- CAJA PRINCIPAL -->
<div id="main">
	
	<h1>Search <?=$_POST['search']?></h1>

	<?php 
		// SEARCH
		$entries = getEntries($db, NULL, NULL, $_POST['search']);

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