<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE HTML>
<!-- pagina index del proyecto -->

 <!-- INICIO codigo ********************************************************** -->
<html lang="en">
	<head>
		<meta charset="utf8" />
		<title>Blog de Videojuego</title>
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	</head>
	<body>
		<!-- HEADER -->
		<header id="header">
			<!-- LOGO -->
			<div id="logo">
				<a href="index.php">
					Videogames Blog
				</a>
			</div>
			
			<!-- MENU -->
			
			<nav id="menu">
				<ul>
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<?php 
						$categories = getCategories($db);
						if (!empty($categories)):
							while ($category = mysqli_fetch_assoc($categories)): 
					?>
								<li>
									<a href="category.php?id=<?=$category['id'];?>"><?=$category['name'];?></a>
								</li>
					<?php 
								endwhile; 
						endif;
					?>
					<li>
						<a href="index.php">Sobre mi</a>
					</li>
					<li>
						<a href="index.php">Contacto</a>
					</li>
				</ul>
			</nav>
		</header>

		<div id="container">