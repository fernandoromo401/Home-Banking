<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../controller/assets/css/bootstrap.css">

</head>
<?php 

//Requiere la db-------------------------------------------------------------------------------------------------------

require '../controller/database.php';

//Inicia la variable de sesion----------------------------------------------------------------------------------------

session_start();

//Selecciona la cuenta con una consulta el dinero actual--------------------------------------------------------------

$query = "SELECT * FROM CUENTA WHERE id_user ='".$_SESSION['user_id']."'";
$consul = mysqli_query($conn, $query);
$results = mysqli_fetch_array($consul);

//Muestra en el aside mi nombre--------------------------------------------------------------------------------------

$usuario = $_SESSION['user'];

//Incluye las partes html-------------------------------------------------------------------------------------------

include 'pages/header/header_profile.html';
include 'pages/body/aside.html';
include 'pages/body/remove.html';

//Si trae algo el formulario pasa la condicion----------------------------------------------------------------------

if (isset($_POST['monto'])) {

//almaceno en variable lo que traigo de la tabla cuenta-------------------------------------------------------------
	
	$id_modificar = $results['id'];
	$monto_actual = $results['dinero'];

//Hago el calculo del monto actual con lo que trae el formulario----------------------------------------------------

	$ingreso = $monto_actual - $_POST['monto'];

//Si el ingreso es menor a 0 me reenvia al perfil-------------------------------------------------------------------

	if ($ingreso < 0) {

		header("Status: 301 Moved Permanently");
		header("Location: profile.php");

	}

	else{

//Sino me modifica el valor de la cuenta donde el id coincida con el id de sesion-----------------------------------

		$query_box = "UPDATE cuenta SET dinero='$ingreso',id_user='".$_SESSION['user_id']."' WHERE id = '$id_modificar' ";
		$consul_box = mysqli_query($conn, $query_box);

	}

//Si la consulta es verdadera pasa la condicion---------------------------------------------------------------------

	if ($consul_box == true) {

		$transaccion = 'Retiraste ';

//Inserta en la tabla movimientos la nueva transaccion--------------------------------------------------------------

			$query_transaccion = "INSERT INTO `movimientos`(`id`, `transaccion`, `valor`, `id_user`) VALUES ('','".$transaccion."','".$_POST['monto']."','".$_SESSION['user_id']."')";
			$consul_transaccion = mysqli_query($conn, $query_transaccion);
	}

//Envia al perfil despues de terminar-------------------------------------------------------------------------------

	header("Status: 301 Moved Permanently");
	header("Location: profile.php");
}


 ?>