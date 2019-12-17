<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="controller/assets/css/bootstrap.css">
</head>
</html>
<body style="background-color: #595959">
<?php   
    //Requiere la base de datos-----------------------------------------------------------------------------------------

    require 'controller/database.php';

    //Incluye al archivo la cabecera y el cuerpo------------------------------------------------------------------------
    include 'inicio_sesion/pages/partes/header/header.html';
    include 'inicio_sesion/pages/partes/body/option.html';

    //Si la variable de sesion tiene algo lo envia al perfil------------------------------------------------------------
    //isset comprueba si tiene algo-------------------------------------------------------------------------------------
    session_start();

    if (isset($_SESSION['user_id'])) {
      header('Location: banco/profile.php');    
    }

?>
</body>
</html>
