<?php
if (isset($_POST)){
	require_once '../includes/conection.php';

	$title = isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
	$description = isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
	$category = isset($_POST['category']) ? (int)$_POST['category'] : false;
	$user_id = $_SESSION['user']['id'];
	
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

		if (isset($_GET['edit'])){
			
			$entry_id = $_GET['edit'];
			$user_id = $_SESSION['user']['id'];

			$sql = "UPDATE entries SET
						title = '$title', 
						category_id = $category, 
						description = '$description'
					WHERE id = $entry_id
					AND user_id = $user_id;";
	 			
			$save = mysqli_query($db, $sql);


		}else{
			$sql = "INSERT INTO 
					entries(user_id, 
							category_id, 
							title, 
							description, 
							date_posted)
					VALUES ($user_id, 
							$category, 
							'$title', 
							'$description', 
							CURDATE());";
	 			
			$save = mysqli_query($db, $sql);
		}

		header("Location: ../index.php");
	}
	else{

		$_SESSION['errors_entry'] = $errors;

		if(isset($_GET['edit'])){
			header("Location: edit_entry.php?id=".$_GET['edit']);				
		}
		header("Location: ../create_entry.php");
	}
}



