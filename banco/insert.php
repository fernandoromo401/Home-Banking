<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../controller/assets/css/bootstrap.css">

</head>
<?php 

//Requiere la db------------------------------------------------------------------------------------------------------

require '../controller/database.php';

//Inicia la sesion----------------------------------------------------------------------------------------------------

session_start();

//Selecciona la cuenta con una consulta el dinero actual--------------------------------------------------------------

$query = "SELECT * FROM CUENTA WHERE id_user ='".$_SESSION['user_id']."'";
$consul = mysqli_query($conn, $query);
$results = mysqli_fetch_array($consul);

//Declaro una variable con el monto actual de ladb------------------------------------------------------------------

$monto_actual = $results['dinero'];

//Muestra en el aside mi nombre--------------------------------------------------------------------------------------

$usuario = $_SESSION['user'];

//Incluye las partes html--------------------------------------------------------------------------------------------

include 'pages/header/header_profile.html';
include 'pages/body/aside.html';
include 'pages/body/insert.html';

//Si tiene algo el monto pasa la condicion--------------------------------------------------------------------------

if (isset($_POST['monto'])) {

//Obtengo el id actual de la tabla user para almacenarlo en una variable y despues ponerlo en la tabla cuenta------
	
	$id_modificar = $results['id'];

//Hago el calculo del monto de la db con el nuevo ingresado---------------------------------------------------------

	$ingreso = $monto_actual + $_POST['monto'];

//Con la variable de sesion modifico con el update el id que coincida-----------------------------------------------

	$query_box = "UPDATE cuenta SET dinero='$ingreso',id_user='".$_SESSION['user_id']."' WHERE id = '$id_modificar' ";
	$consul_box = mysqli_query($conn, $query_box);

//Si la consulta anterior es verdadera pasa la condicion------------------------------------------------------------

	if ($consul_box == true) {

		$transaccion = 'Ingresaste ';

//Inserta en la tabla movimientos una nueva transaccion-------------------------------------------------------------
		
		$query_transaccion = "INSERT INTO `movimientos`(`id`, `transaccion`, `valor`, `id_user`) VALUES ('','".$transaccion."','".$_POST['monto']."','".$_SESSION['user_id']."')";
		$consul_transaccion = mysqli_query($conn, $query_transaccion);

	}

//Reenvia al perfil despues de terminar----------------------------------------------------------------------------

	header("Status: 301 Moved Permanently");
	header("Location: profile.php");
}


 ?>