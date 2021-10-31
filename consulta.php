<?php
// consulta select desde PHP
$query = mysqli_query($conexion, "SELECT * FROM users");

// creamos la variable dnd descargar los contenidos y iteramos hasta que no haya mas datos para descargar
while($users = mysqli_fetch_assoc($query)){
	echo "<hr/>";
	echo $users['id']."   ";
	echo $users['name']."   ";
	echo $users['department_id']."   ";
	echo $users['sex']."   ";
	echo $users['dob']."   ";
	// var_dump($users);
}