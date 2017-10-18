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
  </head>

  <body class="uk-height-1-1">
    <div class="uk-vertical-align uk-text-center">
      <br>
      <img class="uk-animation-slide-right" width="140" height="120" src="../.png" alt="">
      <h1 class="uk-text-center">Reparar Vehículo</h1>
        <div class="uk-vertical-align-middle" style="width: 450px;">
            <form action="../controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">

              <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Número de Matrícula:</label><br>
                <?php $db->Select_Numero_Matricula(); ?>
              </div>
              <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Franquicia a Asistir:</label><br>
                <?php $db->Select_Codigo_Franquicia(); ?>
              </div>
              <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Fecha de Reparación (Cita):</label><br>
                <div class="uk-form-row uk-form-icon">
                  <i class="uk-icon-calendar"></i>
                  <input required class="uk-form-width-large" type="date" placeholder="" name="fecha_reparacion" id="fecha_reparacion"/>
                </div>
              </div>
              <div class="uk-form-row uk-form-ico">
                <i class="uk-icon-gears uk-align-left"></i>
                  <label class="uk-form uk-h3 uk-align-left">Tipo de Reparación:</label><br>
                    <div class="uk-form-row">
                      <textarea required  class="uk-form-width-large " type="textarea" placeholder="Tipo de Reparación"  name="tipo_reparacion" id="tipo_reparacion"></textarea>
                    </div>
              </div>
              <div class="uk-form-row uk-form-ico">
                <i class="uk-icon-eye uk-align-left"></i>
                  <label class="uk-form uk-h3 uk-align-left">Observaciones:</label><br>
                    <div class="uk-form-row">
                      <textarea required  class="uk-form-width-large " type="textarea" placeholder="Observaciones"  name="observaciones" id="observaciones"></textarea>
                    </div>
               </div>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-usd"></i>
                <input required class="uk-form-width-large" type="number" min="1" placeholder="Precio (sin puntos ni comas)" name="precio" id="precio" />
              </div>
              <div class="uk-form-row">
                <button type="submit" value="Registrar" id="btnReparacionVehiculo" name="btnReparacionVehiculo" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Envíar Solicitud</button>
              </div>
            </form><p>
            <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
        </div>
      </div>
    </body>
</html>
