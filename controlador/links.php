<?php

class links{

  private $RegistrarEmpleado;
  private $RegistrarVehiculo;
  private $ReparacionVehiculo;
  private $RegistrarCliente;
  private $CerrarSesion;
function links(){

  $this->RegistrarEmpleado="<a href='../vista/RegistrarEmpleado.php' class='uk-button uk-button-primary uk-button-large'>Registrar Empleado</a>";
  $this->RegistrarVehiculo="<a href='../vista/RegistrarVehiculo.php' class='uk-button uk-button-primary uk-button-large'>Registrar Vehículo</a>";
  $this->RegistrarCliente="<a href='../vista/RegistrarCliente.php' class='uk-button uk-button-primary uk-button-large'>Registrar Cliente</a>";
  $this->ReparacionVehiculo="<a href='../vista/ReparacionVehiculo.php' class='uk-button uk-button-primary uk-button-large'>Reparacion de Vehículo</a>";
  $this->ListarClientes="<a href='../vista/PublicarClientes.php' class='uk-button uk-button-success uk-button-large'>Listar Clientes</a>";
  $this->ListarVehiculos="<a href='../vista/PublicarVehiculos.php' class='uk-button uk-button-success uk-button-large'>Listar Vehículos</a>";
  $this->ListarCitas="<a href='../vista/PublicarCitas.php' class='uk-button uk-button-success uk-button-large'>Listar Citas</a>";
  $this->CerrarSesion="<hr class='uk-grid-divider'><a href='../index.php' class='uk-button uk-button-danger uk-button-large'>Cerrar Sesión</a>";

}

function MostrarLinks(){

//echo "<form action='../controlador/control.php' method='POST'><p>";
  if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']=='1') {
      echo "<hr class='uk-grid-divider'>";
      echo $this->RegistrarEmpleado ." ";
      echo $this->RegistrarCliente ." ";
      echo $this->RegistrarVehiculo ." ";
      echo $this->ReparacionVehiculo ." <br><br>";
      echo $this->ListarClientes ." ";
      echo $this->ListarVehiculos ." ";
      echo $this->ListarCitas ." ";
      echo $this->CerrarSesion;
    }else{
      echo "<hr class='uk-grid-divider'>";
      echo $this->RegistrarCliente ." ";
      echo $this->RegistrarVehiculo ." ";
      echo $this->ReparacionVehiculo ." <br><br>";
      echo $this->ListarClientes ." ";
      echo $this->ListarVehiculos ." ";
      echo $this->ListarCitas ." ";
      echo $this->CerrarSesion;
    }
  }else{
    header("Location: ../index.php");
  }
//echo "</p><br></form>";
}

}?>
