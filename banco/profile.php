<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../controller/assets/css/bootstrap.css">

</head>
<body>
<?php

  //Inicia la variable de sesion--------------------------------------------------------------------------------------
    
  session_start();

  //Requiere la db----------------------------------------------------------------------------------------------------
  
  require '../controller/database.php';

  //Si tiene algo la variable de sesion hace la consulta sino dirige al login-----------------------------------------
  
  if (isset($_SESSION['user_id'])) {
    $query = "SELECT id, email, password FROM USERS WHERE id ='".$_SESSION['user_id']."'";
    $consul = mysqli_query($conn, $query);
    $results = mysqli_fetch_array($consul);
  }

  else{
    header('Location: ../inicio_sesion/pages/login.php');  
  }

//Consulta del dinero en mi cuenta-----------------------------------------------------------------------------------

  $query = "SELECT * FROM CUENTA WHERE id_user ='".$_SESSION['user_id']."'";
  $consul = mysqli_query($conn, $query);
  $results = mysqli_fetch_array($consul);

//Muestra en el aside mi nombre--------------------------------------------------------------------------------------

  $usuario = $_SESSION['user'];

//Muestra los ultimos 3 movimientos----------------------------------------------------------------------------------

  $query_transaccion = "SELECT * FROM MOVIMIENTOS WHERE id_user ='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT 3 ";
  $consul_con = mysqli_query($conn, $query_transaccion);

//Incluye las 3 partes de html---------------------------------------------------------------------------------------

  include 'pages/header/header_profile.html';

  include 'pages/body/aside.html';

  include 'pages/body/body.html';

?>




