<?php
if (isset($_POST)){
	require_once 'includes/conexion.php';

	$title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
	$description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
	$category = isset($_POST['category']) ? (int)$_POST['category'] : false;
	$user_id = $_SESSION['user']['id'];
	var_dump($_SESSION);
	// ARRAY OF ERRORS
	$errors = array();

	// VALIDATE VALUES BEFORE UPDATING DATABASE
	if(!empty($title)){
		$validation = true;
	}else{
		$validation = false;
		$errors['title'] = "el nombre es invalido";
	}

	if(!empty($description)){
		$validation = true;
	}else{
		$validation = false;
		$errors['description'] = "the description is invalid";
	}

	if(!empty($category)){
		$validation = true;
	}else{
		$validation = false;
		$errors['category'] = "the category ID i invalid";
	}

	if(count($errors) == 0){
		$sql = "INSERT INTO entries(user_id, category_id, title, description, date_posted)
							VALUES ($user_id, $category, '$title', '$description', CURDATE());";
		$save = mysqli_query($db, $sql);
		header("Location: index.php");
	}
	else{
		$_SESSION['errors_entry'] = $errors;
		header("Location: create_entry.php");
	}
}



