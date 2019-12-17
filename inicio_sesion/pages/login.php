<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="../../controller/assets/css/bootstrap.css">
</head>

<body style="background-color: #595959">

<?php

  //Oculta las advertencias de php--------------------------------------------------------------------------------------

  error_reporting(0);

  //Incluye la cabecera-------------------------------------------------------------------------------------------------

  include 'partes/header/header.html';
  
  //Si la variable de sesion tiene algo lo envia al perfil--------------------------------------------------------------

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');    
  }

  //Requiere el archivo de conexion a la db-----------------------------------------------------------------------------

  require '../../controller/database.php';

  //Si los campos traen algo pasa la condicion--------------------------------------------------------------------------

  if (!empty($_POST['email']) && !empty($_POST['password'])) {  

  //Consulta a la db donde el mail y pass coincidan-------------------------------------------------------------------  
    
    $query = "SELECT id,usuario, email, password FROM USERS WHERE email ='".$_POST['email']."'AND password = '".$_POST['password']."'";
    $consul = mysqli_query($conn, $query);

    //Obtiene una fila de resultados como un array asociativo-----------------------------------------------------------

    $results = mysqli_fetch_array($consul);
    
    $message = '';   

    //Cuenta todos los elementos de un array o algo de un objeto--------------------------------------------------------
    
    if (count($results) >0) {

    //Si encuentra un resultado declara las variables de sesiones y te dirige al perfil---------------------------------

      $_SESSION['user_id'] = $results["id"];
      $_SESSION['user'] = $results['usuario'];
      header("Location: ../../banco/profile.php");

    } else {

      $message = 'Disculpe, usuario o contraseña inválido.';

    }
  }

  //Incluye el cuerpo de html-------------------------------------------------------------------------------------------

  include 'partes/body/login.html';
  ?>

</body>
</html>