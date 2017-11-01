<?php
session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
if (!isset($_SESSION['codigo_empleado'])) {
  header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publicaciones</title>
    <!-- link all the styles -->
    <link href="/favicon.ico" rel="shortcut icon">
    <!-- link all the styles -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <!-- link all the scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/uikit.min.js"></script>

  </head>
  <body>
    <div class="container">
    <div class="uk-container uk-align-center">
<br>
    <h1 class="uk-text-center">Clientes Registrados</h1>
      <br><div class="uk-overflow-auto">
          <?php
          require_once '../modelo/Listar.php';
          $mostrar = new Listar();
          $mostrar->ListarClientes();
           ?>
      </div>
      <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a><hr>

        </div>
      </div>

    </body>
</html>
