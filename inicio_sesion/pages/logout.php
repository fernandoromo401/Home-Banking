<?php

//Inicia la variable de sesion---------------------------------------------------------------------------------------

  session_start();

//Libera todas las sesiones actualmente registrada------------------------------------------------------------------

  session_unset();

//Destruye las variable de sesion iniciadas-------------------------------------------------------------------------

  session_destroy();

//Envia al index----------------------------------------------------------------------------------------------------

  header('Location: ../../index.php');
?>
