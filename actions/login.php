<?php
//initiate session and connection to db
require_once '../includes/conection.php';

// get values from form
if(isset($_POST)){

	// erase past errors:
	if(isset($_SESSION['error_login'])){
		unset($_SESSION['error_login']);
	}

	// get credentials
	$email = trim($_POST['email']);
	$password = $_POST['password'];

	// query db looking for user
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$login = mysqli_query($db, $sql);

	if($login && mysqli_num_rows($login) == 1){

		$user = mysqli_fetch_assoc($login);

		// validate password
		$verify = password_verify($password, $user['password']);

		if($verify){
			// use session to save loged user data
			$_SESSION['user'] = $user;

		}else{
			// if something fails return session with errors
			$_SESSION['error_login'] = "Incorrect login!";
		}
	}else{
		// error message
		$_SESSION['error_login'] = "Incorrect login!!";
	}
}

header('Location: ../index.php');