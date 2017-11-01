<!DOCTYPE html>
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
      <img class="uk-animation-slide-right" width="140" height="120" src="../RegistroEmpleado.png" alt="">
      <h1 class="uk-text-center">Registrar Nuevo Empleado</h1>
        <div class="uk-vertical-align-middle" style="width: 450px;">
            <form action="../controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-th"></i>
                <input required  class="uk-form-width-large" type="number" placeholder="Cédula" min="10000000" name="cedula" id="cedula"/>
              </div>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-user"></i>
                <input required  class="uk-form-width-large" type="text" placeholder="Nombre y Apellidos" name="nombre" id="nombre"/>
              </div>
              <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Fecha de Comienzo del Contrato:</label><br>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-calendar"></i>
                <input required class="uk-form-width-large" type="date" placeholder="" name="fecha_comienzo_contrato" id="fecha_comienzo_contrato"/>
              </div>
              </div>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-usd"></i>
                <input required class="uk-form-width-large" type="number" min="100000" placeholder="Salario (sin puntos ni comas)" name="salario" id="salario" />
              </div>
                <div class="uk-form-row">
                <label class="uk-form uk-h3 uk-align-left">Franquicia Asignada:</label><br>
                <div class="uk-form-row">
                  <select required class="uk-form-width-large" name="franquicia_asignada" id="franquicia_asignada">
                  <option value="100">Antioquia</option>
                 <option value="200">Bogotá</option>
                 <option value="300">Cartagena</option>
                 <option value="400">Valle</option>
                </select>
              </div>
              </div>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-mobile"></i>
                <input required  class="uk-form-width-large" type="number" min="3100000000" placeholder="Teléfono" name="telefono" id="telefono"/>
              </div>
              <div class="uk-form-row">
                <button type="submit" value="Registrar" id="btnRegistrarEmpleado" name="btnRegistrarEmpleado" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Registrar</button>
              </div>
            </form><p>
            <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
        </div>
      </div>
    </body>
</html>
