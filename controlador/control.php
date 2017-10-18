<?php
session_start();

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
  require '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();
  $db->ValidarLogin($_POST['cedula'], $_POST['codigo_empleado']);
}

//Si se registra un nuevo empleado...
if (isset($_POST['btnRegistrarEmpleado'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Registrar(array(null, $_POST['cedula'],$_POST['nombre'],$_POST['fecha_comienzo_contrato'], $_POST['salario'], $_POST['franquicia_asignada']), "empleados");
    //$db->TelefonosEmpleado(null, $_POST['telefono']);
    header('Location: ../vista/contenido.php');
}

//Si se registra un nuevo cliente...
if (isset($_POST['btnRegistrarCliente'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Registrar(array(null, $_POST['cedula'], $_POST['nombre']), "clientes");
    $db->Registrar(array(null, $_POST['direccion'], $_POST['ciudad']), "direcciones_cliente");
    header('Location: ../vista/contenido.php');
}

//Si se registra un nuevo vehiculo...
if (isset($_POST['btnRegistrarVehiculo'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Registrar(array($_POST['numero_matricula'], $_POST['fecha_compra']), "vehiculos");
    $db->Registrar(array($_POST['numero_matricula'], $_POST['tipo']), "tipo_vehiculo");
    $db->IdentificarTipo(array($_POST['numero_matricula'], $_POST['tipo'], $_POST['numero_defensas'], $_POST['numero_puertas']));
    $db->Registrar(array($_POST['codigo_cliente'], $_POST['numero_matricula']), "vehiculos_cliente");
    header('Location: ../vista/contenido.php');
}

if (isset($_POST['btnReparacionVehiculo'])) {
  require '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();
  $db->Registrar(array($_POST['numero_matricula'], $_POST['fecha_reparacion'], $_POST['tipo_reparacion'], $_POST['observaciones'], $_POST['precio']), "reparaciones_vehiculo");
  $db->Registrar(array($_POST['codigo_franquicia'], $_POST['numero_matricula']), "vehiculo_frecuenta_franquicia");
  $db->Registrar(array($_POST['codigo_franquicia'], $_POST['codigo_cliente']), "clientes_frecuentan_franquicias");
  header('Location: ../vista/contenido.php');
}


//Si votan...
if (isset($_POST['btnVotar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Votar($row['id_user'],$row['id_publicacion']);
//    header('Location: ../vista/contenido.php');
}

//Eliminar sesion
if (isset($_POST['btnEliminar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarUsuario($_POST['id_usuario']);
//    header('Location: ../vista/contenido.php');
  }
}

//Editar sesion
if (isset($_POST['btnEditar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarUsuario($_POST['id_usuario']);
    //header('Location: ../vista/editar.php');
  }
}

if (isset($_POST['btnCrearPublicacion'])) {
    require_once '../modelo/conexion.php';
    require_once '../modelo/publicar.php';
    $db = new conexion();
    $model = new publicar();
    $db->Conectar();
    $model->CrearPublicacion(array(null, $_POST['descripcion'], $_POST['link'], 0, 0));
    $model->PublicacionUsuario(array($_SESSION['id_user'], null));

    header('Location: ../vista/contenido.php');
}

if (isset($_POST['btnComentar'])) {
  session_start();
  if ($_SESSION['id_user']!=0) {
  require_once '../modelo/comentar.php';
  $go = new comentar();
  $go->SubirComentario(array(null, $_SESSION['id_user'],$_POST['id_publicacion'],$_POST['textarea']));
  }else {
    header('Location: ../index.php');
  }
}


?>
