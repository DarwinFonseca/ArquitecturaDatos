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
      <img class="uk-animation-slide-right" width="140" height="120" src="../RegistroCliente.png" alt="Clientes">
      <h1 class="uk-text-center">Registrar Nuevo Cliente</h1>
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
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-home"></i>
                <input required  class="uk-form-width-large" type="text" placeholder="Dirección" name="direccion" id="direccion"/>
              </div>
              <div class="uk-form-row uk-form-icon">
                <i class="uk-icon-map"></i>
                <input required  class="uk-form-width-large" type="text" placeholder="Ciudad" name="ciudad" id="ciudad"/>
              </div>
              <div class="uk-form-row">
                <button type="submit" value="Crear sesión" id="btnRegistrarCliente" name="btnRegistrarCliente" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Registrar</button>
              </div>
            </form><p>
            <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
        </div>
      </div>
    </body>
</html>
