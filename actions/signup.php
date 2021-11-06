<?php
if(isset($_POST)){
	// CONNECT TO DATABASE
	require_once '../includes/conection.php';

	// GET SIGNUP VALUES BY POST
	$name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
	$surname = isset($_POST['surname']) ? mysqli_real_escape_string($db,$_POST['surname']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
	$password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

	// ARRAY OF ERRORS
	$errors = array();

	// VALIDATE VALUES BEFORE UPDATING DATABASE
	if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
		$validation = true;
	}else{
		$validation = true;
		$errors['name'] = "el nombre es invalido";
	}
	if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
		$validation = true;
	}else{
		$validation = false;
		$errors['surname'] = "el surname es invalido";
	}
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$validation = true;
	}else{
		$validation = false;
		$errors['email'] = "el email es invalido";
	}
	if(!empty($password)){
		$validation = true;
	}else{
		$validation = false;
		$errors['password'] = "el email esta vacio";
	}


	$save_user = false;
	if(count($errors) == 0){
		
		$save_user = true;

		//CIFRAR LA PASSWORD
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

		// INSERT USERS IN DATABASE IN USERS TABLE
		$sql = "INSERT INTO users(name, surname, email, password, dob) VALUES ('$name', '$surname', '$email', '$hash', CURDATE())";
		$save = mysqli_query($db, $sql);

		if($save){
			$_SESSION['completed'] = "Your completed your signup succesfully";
		}else{
			$_SESSION['errors']['general'] = "error when saving user";
		}

	}else{
		$_SESSION['errors'] = $errors;
	}
}
header('Location: ../index.php');