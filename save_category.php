<?php
if (isset($_POST)){
	require_once 'includes/conexion.php';

	$name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;

	// ARRAY OF ERRORS
	$errors = array();

	// VALIDATE VALUES BEFORE UPDATING DATABASE
	if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
		$validation = true;
	}else{
		$validation = true;
		$errors['name'] = "el nombre es invalido";
	}

	if(count($errores) == 0){
		$sql = "INSERT INTO categories VALUES(NULL, '$name');";
		$save = mysqli_query($db, $sql);
	}
}

header("Location: index.php");