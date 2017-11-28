<?php
session_start();

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
  require '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();
  $mw-> new middleware();
  $mw->ValidarLogin($_POST['cedula'], $_POST['codigo_empleado']);
  $db->CerrarConexion();
}

//Si se registra un nuevo empleado...
if (isset($_POST['btnRegistrarEmpleado'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $mw-> new middleware();
    $mw->Registrar(array(null, $_POST['cedula'],$_POST['nombre'],$_POST['fecha_comienzo_contrato'], $_POST['salario'], $_POST['franquicia_asignada']), "empleados");
    //$db->TelefonosEmpleado(null, $_POST['telefono']);
    $db->CerrarConexion();
    header('Location: ../vista/contenido.php');
}

//Si se registra un nuevo cliente...
if (isset($_POST['btnRegistrarCliente'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $mw-> new middleware();
    $mw->Registrar(array(null, $_POST['cedula'], $_POST['nombre']), "clientes");
    $mw->Registrar(array(null, $_POST['direccion'], $_POST['ciudad']), "direcciones_cliente");
    $db->CerrarConexion();
    header('Location: ../vista/contenido.php');
}

//Si se registra un nuevo vehiculo...
if (isset($_POST['btnRegistrarVehiculo'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $mw-> new middleware();
    $mw->Registrar(array($_POST['numero_matricula'], $_POST['fecha_compra']), "vehiculos");
    $mw->Registrar(array($_POST['numero_matricula'], $_POST['tipo']), "tipo_vehiculo");
    $mw->IdentificarTipo(array($_POST['numero_matricula'], $_POST['tipo'], $_POST['numero_defensas'], $_POST['numero_puertas']));
    $mw->Registrar(array($_POST['codigo_cliente'], $_POST['numero_matricula']), "vehiculos_cliente");
    $db->CerrarConexion();
    header('Location: ../vista/contenido.php');
}

if (isset($_POST['btnReparacionVehiculo'])) {
  require '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();
  $mw-> new middleware();
  $mw->Registrar(array($_POST['numero_matricula'], $_POST['fecha_reparacion'], $_POST['tipo_reparacion'], $_POST['observaciones'], $_POST['precio']), "reparaciones_vehiculo");
  $mw->Registrar(array($_POST['codigo_franquicia'], $_POST['numero_matricula']), "vehiculo_frecuenta_franquicia");
  $mw->Registrar(array($_POST['codigo_franquicia'], $_POST['codigo_cliente']), "clientes_frecuentan_franquicias");
  $db->CerrarConexion();
  header('Location: ../vista/contenido.php');
}


//Eliminar sesion
if (isset($_POST['btnEliminar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $mw-> new middleware();
    $mw->EliminarUsuario($_POST['id_usuario']);
    $db->CerrarConexion();
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
    $mw-> new middleware();
    $mw->EditarUsuario($_POST['id_usuario']);
    $db->CerrarConexion();
    //header('Location: ../vista/editar.php');
  }
}

?>
