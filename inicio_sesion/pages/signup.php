<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrarse</title>
  <link rel="stylesheet" type="text/css" href="../../controller/assets/css/bootstrap.css">
</head>
<body style="background-color: #595959">

<?php

//Oculta las advertencias de php---------------------------------------------------------------------------------------

  error_reporting(0);

//Incluye la cabecera--------------------------------------------------------------------------------------------------

  include 'partes/header/header.html';
  
//Comprueba si la sesion tiene algo y si es asi lo envia al perfil-----------------------------------------------------

  if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');    
  }

//Requiere la db------------------------------------------------------------------------------------------------------

  require '../../controller/database.php';

//!Empty comprueba si las variables tienen algo si es asi pasa la condicion-------------------------------------------

  if (!empty( $_POST['name']) && !empty( $_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {  

//Si las dos pass coinciden pasan la segunda condicion---------------------------------------------------------------

    if($_POST['password'] == $_POST['confirm_password']){

      //Encriptar Pass///

      

      //////////////////

//Selecciona la db para ver si hay un mail igual--------------------------------------------------------------------

      $query = "SELECT id FROM USERS WHERE email ='".$_POST['email']."'";
      $consul = mysqli_query($conn, $query);
      $results = mysqli_fetch_array($consul);

//Count cuenta lo que hay en result y si no hay devuelve 0 si es 0 pasa la condicion--------------------------------
      
      if (count($results) == 0) {

//Inserta los datos en la db----------------------------------------------------------------------------------------

        $query = "INSERT INTO USERS (usuario, email, password) VALUES ('".$_POST['name']."' ,'".$_POST['email']."' ,'".$_POST['password']."')";
        $consul = mysqli_query($conn, $query);     
           
        $message = 'Se creó el nuevo usuario';

//Si se inserta un nuevo usuario selecciona la db

        if ($consul == true) {

          $query = "SELECT id,usuario, email, password FROM USERS WHERE email ='".$_POST['email']."'";
          $consul = mysqli_query($conn, $query);
          $results = mysqli_fetch_array($consul);

//Si el resultado es mayor a 0 selecciona la variable de sesion--------------------------------------------------------
//Inserta en la cuenta un valor 0 y en la fk el id de la tabla user----------------------------------------------------

          if (count($results) > 0) {

            $_SESSION['user_id'] = $results["id"];

            $query_box = "INSERT INTO `cuenta`(`id`, `dinero`, `id_user`) VALUES ('','0.00','".$_SESSION['user_id']."')";
            $consul_box = mysqli_query($conn, $query_box);

            

          }

          
        }
        else{
          echo "No se creo la cuenta correctamente";
        }

      }
      else{
        $message = 'El email ya existe';
      }

    }else{
      $message="La contraseña no coincide";
    }
    
  }
  else{
    $message="Hay campos vacios, llene los campos";
  }

//Incluye el body html------------------------------------------------------------------------------------------------

include 'partes/body/signup.html';
  
?>

</body>
</html>