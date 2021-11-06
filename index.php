<?php require_once 'includes/header.php';?>

<?php require_once 'includes/aside.php';?>

<!--________________ MAIN __________________	-->

<div id="main">
	<h1>Last Entries</h1>

	<?php 
		$entries = getEntries($db, 4);
		if(!empty($entries)):

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
		endif;
	?>
	
		
	<div id="see-all">
		<a href="entries.php">see all</a>
	</div>
</div>

<!-- ______________ END MAIN __________________ -->
	

<?php require_once 'includes/footer.php';?>