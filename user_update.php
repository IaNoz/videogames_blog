<?php
if(isset($_POST)){
	// CONNECT TO DATABASE
	require_once 'includes/conexion.php';

	// GET SIGNUP VALUES BY POST
	$name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
	$surname = isset($_POST['surname']) ? mysqli_real_escape_string($db,$_POST['surname']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;

	// ARRAY OF ERRORS
	$errors = array();

	// VALIDATE VALUES BEFORE UPDATING DATABASE
	if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
		$validation = true;
	}else{
		$validation = true;
		$errors['name'] = "the name you introduced is invalid. remember names can contain numeric symbols ";
	}
	if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
		$validation = true;
	}else{
		$validation = false;
		$errors['surname'] = "the surname you introduced is invalid. remember names can contain numeric symbols";
	}
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$validation = true;
	}else{
		$validation = false;
		$errors['email'] = "the name you introduced is invalid. Please insert a correct email (exmple@example.net)";
	}

	$save_user = false;
	if(count($errors) == 0){
	
		$user = $_SESSION['user'];

		$save_user = true;


		// CHECK THAT USER EMAIL DOES NOT EXISTS IN DATABASE
		$sql = "SELECT id, email FROM users WHERE email = '$email';";
		
		$isset_email = mysqli_query($db, $sql);
		
		$isset_user = mysqli_fetch_assoc($isset_email);

		if($isset_user['id'] == $user['id'] || empty($isset_user)){

			// 	UPDATE USERS IN DATABASE IN USERS TABLE
			$sql = "UPDATE users SET
					name = '$name',
					surname = '$surname',
					email = '$email'
					WHERE id = ".$user['id'].";";
			$save = mysqli_query($db, $sql);

			if($save){
	
				$_SESSION['user']['name'] = $name;
				$_SESSION['user']['surname'] = $surname;
				$_SESSION['user']['email'] = $email;

				$_SESSION['completed'] = "Your data update has been completed succesfully";
			}else{
		
				$_SESSION['errors']['general'] = "Error when saving user data. te jodes pues!";
			}
		
		}else{
			
			$_SESSION['errors']['general'] = "User already exists";
		
		}

	}else{
		$_SESSION['errors'] = $errors;
	}
}
header('Location: my_profile.php');