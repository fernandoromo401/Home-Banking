<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../controller/assets/css/bootstrap.css">

</head>
<?php 

//Requiere la conexion a la db----------------------------------------------------------------------------------------

require '../controller/database.php';

//Inicia la variable de sesion----------------------------------------------------------------------------------------

session_start();

//Declara la variable de sesion para mostrar en el aside--------------------------------------------------------------

$usuario = $_SESSION['user'];

//Hace la consulta, los ordena en descendete y muestra los ultimos 10 registros solamente-----------------------------

$query_transaccion = "SELECT * FROM MOVIMIENTOS WHERE id_user ='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT 10 ";
$consul_con = mysqli_query($conn, $query_transaccion);

//Incluye las partes html---------------------------------------------------------------------------------------------

include 'pages/header/header_profile.html';
include 'pages/body/aside.html';
include 'pages/body/movement.html';

?>