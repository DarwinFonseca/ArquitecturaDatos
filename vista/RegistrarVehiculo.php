<!DOCTYPE html>
<?php
require_once '../modelo/conexion.php';
$db = new conexion();
$db->Conectar();
?>

<!--?php
    session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
    include_once('modelo/conexion.php');
    if(isset($_SESSION['id_user'])){
      header('Location: index.php');
    }
?-->
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Crear una sesión</title>
      <link rel="stylesheet" href="https://getuikit.com/v2/docs/css/uikit.docs.min.css">
      <script src="https://getuikit.com/v2/vendor/jquery.js"></script>
      <script src="https://getuikit.com/v2/docs/js/uikit.min.js"></script>
      <script src="../js/myjs.js"></script>
  </head>

  <body class="uk-height-1-1">
    <div class="uk-vertical-align uk-text-center">
      <br>
      <img class="uk-margin-bottom" width="140" height="120" src="" alt="">
      <h1 class="uk-text-center">Registrar Nuevo Vehículo</h1>
        <div class="uk-vertical-align-middle" style="width: 450px;">
            <form action="../controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-sort-numeric-asc"></i>
                <input required  class="uk-form-width-large" type="text" placeholder="Número de Matrícula" name="numero_matricula" id="numero_matricula"/>
              </div>
              <div class="uk-form-row">
              <label class="uk-form uk-h3 uk-align-left">Fecha de Compra:</label><br>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-calendar"></i>
                <input required  class="uk-form-width-large" type="date" name="fecha_compra" id="fecha_compra"/>
              </div>
              </div>
              <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Cliente del vehiculo:</label><br>
                <?php $db->Select_Codigo_Cliente(); ?>
              </div>
                <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Tipo de Vehículo:</label><br>
                <div class="uk-form-row">
                  <select id="tipo" required class="uk-form-width-large" name="tipo" onchange="change()">
                    <option value="Todo Terreno">Todo Terreno</option>
                    <option value="Utilitario">Utilitario</option>
                  </select>
                </div>
              </div>
              <div id="todoterreno" class="uk-form-row">
                <div class="uk-form-row uk-form-icon">
                  <i class="uk-icon-automobile "></i>
                  <input class="uk-form-width-large" type="number" min="1" max="10" placeholder="Número de Defensas" name="numero_defensas" id="numero_defensas"/>
                </div>
              </div>
              <div id="utilitario" class="uk-form-row">
                <div class="uk-form-row uk-form-icon">
                  <i class="uk-icon-automobile "></i>
                  <input class="uk-form-width-large" min="1" max="5" type="number" placeholder="Número de Puertas" name="numero_puertas" id="numero_puertas"/>
                </div>
              </div>
              <div class="uk-form-row">
                <button type="submit" value="Crear sesión" id="btnRegistrarVehiculo" name="btnRegistrarVehiculo" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Registrar</button>
              </div>
            </form><p>
            <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
        </div>
      </div>
    </body>
</html>
