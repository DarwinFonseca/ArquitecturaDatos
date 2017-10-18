<!DOCTYPE html>
<html lang="es">
<?php
   session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
//   session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
/*
if(!isset($_SESSION['id_user'])){
    //header('Location: ../index.php');
    $_SESSION['id_user']="0";
    $_SESSION['username']="Invitado";
  }*/
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <link href="/favicon.ico" rel="shortcut icon">
    <!-- link all the styles -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <!-- link all the scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/uikit.min.js"></script>
  </head>
  <body>
    <div class="container" >
      <div class="uk-container uk-align-center">
        <br>
          <h1 class="uk-h1 uk-text-center">Bienvenido <?=$_SESSION['nombre'];?> </h1><br>
            <p>
              Su ID es <?=$_SESSION['codigo_empleado'];?>,
              Su Nombre es <?=$_SESSION['nombre'];?>,
              Su Cédula es <?=$_SESSION['cedula'];?>,
              Su Fecha es <?=$_SESSION['fecha_contrato'];?>,
              Su Franquicia es <?=$_SESSION['franquicia_asignada'];?>,
              Su Rol es <?=$_SESSION['admin'];?>
            </p>

            <div class="uk-grid-divider uk-grid-margin uk-text-center">
            <?php
              require_once '../controlador/links.php';
              $mostrar = new links();
              $mostrar->MostrarLinks();
             ?>
           </div>
            <!--br><br>
             <div class="uk-overflow-auto">
              <!?php
                require_once '../modelo/publicar.php';
                $mostrar = new publicar();
                $mostrar->ConsutarPublicaciones();
               ?>
            </div>
            <br-->
<!--?php
//trae el código para editar los usuarios según el r01
require_once '../controlador/links.php';
$vinculos = new links();
$vinculos->MostrarLinks();
?-->
      </div>
    </div>
  </body>
</html>
