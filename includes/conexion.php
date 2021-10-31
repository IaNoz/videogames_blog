<?php
// CONNECTION
$server = "localhost";
$username = "wp";
$password = "wp";
$database = "videogames_blog";

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// START A NEW SESSION
if(!isset($_SESSION)){
	session_start();
}
?>