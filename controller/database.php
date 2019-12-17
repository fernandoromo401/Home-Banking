<?php

//Declaro variables del servidor----------------------------------------------------------------------------------------

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

//Conecto la db --------------------------------------------------------------------------------------------------------

$conn = mysqli_connect($server, $username, $password, $database);

//Compruebo si no se conecte me envia a la pagina de error--------------------------------------------------------------

if ($conn == false) {
	header("Status: 301 Moved Permanently");
	header("Location: controller/error.php");
}

?>
