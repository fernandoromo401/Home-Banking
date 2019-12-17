<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../controller/assets/css/bootstrap.css">

</head>
<?php 

//Requiere la db--------------------------------------------------------------------------------------------------------

require '../controller/database.php';

//Oculta las advertencias de php----------------------------------------------------------------------------------------

error_reporting(0);

//Inicia la variable de sesion------------------------------------------------------------------------------------------

session_start();

//Hace la consulta a la db----------------------------------------------------------------------------------------------

$query = "SELECT id,usuario, email, password FROM USERS WHERE id = '".$_SESSION['user_id']."'";
$consul = mysqli_query($conn, $query);
$results = mysqli_fetch_array($consul);

//Declara la variable de sesion para mostrar en el aside---------------------------------------------------------------

$usuario = $_SESSION['user'];

//Incluye las partes html----------------------------------------------------------------------------------------------

include 'pages/header/header_profile.html';
include 'pages/body/aside.html';

//Almacenas en variables lo que trae el formulario---------------------------------------------------------------------

$pass_actual =  $_POST['actual'];
$pass_nueva = $_POST['nueva'];

$mensaje = '';

//Si vienen con algo las variables pasan la condicion------------------------------------------------------------------

if (!empty($pass_actual) && !empty($pass_nueva)) {    

//Hace la consulta donde las id coincidan------------------------------------------------------------------------------
    
    $query = "SELECT id,usuario, email, password FROM USERS WHERE id = '".$_SESSION['user_id']."'";
    $consul = mysqli_query($conn, $query);
    $results = mysqli_fetch_array($consul);

//Si el resultado en mayor a 0 pasa la concicion-----------------------------------------------------------------------
    
    if (count($results) > 0) {

//Si la pass que ingresamos es igual a la que hay registrada pasa la condicion-----------------------------------------

    	if ($pass_actual == $results['password']) {

//Modifica la tabla con la nueva pass ingresada------------------------------------------------------------------------

    		$query1 = "UPDATE users SET password='$pass_nueva' WHERE id='".$_SESSION['user_id']."'";
    		$consul1 = mysqli_query($conn, $query1);

//Si se da la consulta pasa la condicion y mensaje toma ese valor------------------------------------------------------

    		if ($consul1 == true) {
    			
    			$mensaje = 'La contraseña se cambio correctamente';

    		}

    	}

    	else{

    		$mensaje = 'La contraseña actual es incorrecta';

    	}

    }
}

else{

	$mensaje = 'Complete los campos';

}

//Incluye el html----------------------------------------------------------------------------------------------------

include 'pages/body/password.html';
?>