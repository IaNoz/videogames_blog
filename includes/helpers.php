<?php

function showErrors($errors, $field){
	$alert = '';
	if(isset($errors[$field]) && !empty($field)){
		$alert = "<div class='alert alert-error'>".$errors[$field]."</div>";
	}else{

	}
	return $alert;
}

function eraseAlerts(){
	
	$deleted = false;
	
	if(isset($_SESSION['errors'])){	
		$_SESSION['errors'] = NULL;
		$deleted = true;
	}

	if(isset($_SESSION['errors_entry'])){	
		$_SESSION['errors_entry'] = NULL;
		$deleted = true;
	}

	if(isset($_SESSION['completed'])){
		$_SESSION['completed'] = NULL;
		$deleted = true;
	}
	return $deleted;
}

function getCategories($conection){
	$sql = "SELECT * FROM categories ORDER BY id ASC";
	$categories = mysqli_query($conection, $sql);

	$result = array();
	if($categories && mysqli_num_rows($categories) >= 1){
		$result = $categories;
	}
	return $result;
}

function getCategory($conection, $id){
	$sql = "SELECT * FROM categories WHERE id = $id;";
	$category = mysqli_query($conection, $sql);

	$result = array();
	if($category && mysqli_num_rows($category) >= 1){
		$result = mysqli_fetch_assoc($category);
	}
	return $result;
}

function getEntries($conection, $limit = NULL, $category_id = NULL, $search = NULL){
	$sql = "SELECT e.*, c.name AS 'category' FROM entries e 
			INNER JOIN categories c 
			ON e.category_id = c.id";

	if (isset($category_id)){
		$sql .= " WHERE e.category_id = $category_id";
	}

	if (isset($search)){
		$sql .= " WHERE e.title LIKE '%$search%'";
	}

	$sql .= " ORDER BY e.id DESC";
			
	if (isset($limit)){
		$sql .= " LIMIT $limit";
	}
	$sql .= ";"; // close sql query

	$entries = mysqli_query($conection, $sql);

	$result = array();

	if ($entries && mysqli_num_rows($entries) >= 1){

		$result = $entries;
	}

	return $entries;
}

function getEntry($conection, $id){
	$sql = "SELECT e.*,c.name AS 'category', 
			CONCAT(u.name,' ',u.surname) AS user FROM entries e
			INNER JOIN categories c ON e.category_id = c.id
			INNER JOIN users u ON e.user_id = u.id
			WHERE e.id = $id";
	$entry = mysqli_query($conection, $sql);

	$result = array();
	
	if ($entry && mysqli_num_rows($entry) >= 1){

			$result = mysqli_fetch_assoc($entry);
	}

	return $result;
}