<?php 

$sql = "INSERT INTO categories(name) VALUES ('technologies')";
$insert = mysqli_query($conexion, $sql);

if ($insert){
	echo "DATOS INSERTADOS CORRECTAMENTE";
}else{
	echo "Error: ".mysqli_error($conexion);
}
 ?>}
}
