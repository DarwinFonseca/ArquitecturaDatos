<?php

class Listar{

function ListarVehiculos(){
  require_once 'conexion.php';
  $db = new conexion();
  $db->Conectar();
  $query="SELECT `vehiculos`.*, `tipo_vehiculo`.*, `vehiculos_cliente`.*, `clientes`.*
          FROM `vehiculos`,`tipo_vehiculo`, `vehiculos_cliente`, `clientes`
          Where `vehiculos`.`Numero_Matricula` = `tipo_vehiculo`.`Numero_Matricula`
          AND `vehiculos_cliente`.`Numero_Matricula` = `vehiculos`.`Numero_Matricula`
          AND `clientes`.`Codigo_Cliente` = `vehiculos_cliente`.`Codigo_Cliente`";
  $result = mysql_query($query);

echo <<< HTML
<div class="uk-panel-box-primary">
  <table width="90%" class="uk-table uk-table-divider uk-table-hover uk-table-responsive"><thead><tr>
  <th>Código del Cliente</th><th>Nombre</th><th># Matrícula</th><th>Fecha de Compra</th><th>Tipo</th>
  </tr></thead><tbody>
HTML;
    while ($row = mysql_fetch_array($result)) {
      echo "<tr><td>".$row["Codigo_Cliente"]."</td><td>" . $row["Nombre"] . "</td><td>" . $row["Numero_Matricula"] . "</td><td>" . $row["Fecha_Compra"] . "</td><td>" . $row["Tipo"] . "</td></tr>";
    if (empty($row)) {
      echo '<tr><td align="center" colspan="5">No hay publicaciones</td></tr>';
    }
  }
  echo '</tbody></table></div>';
  }

  function ListarClientes(){
    require_once 'conexion.php';
    $db = new conexion();
    $db->Conectar();
    $query="SELECT `clientes`.*, `direcciones_cliente`.*
FROM `clientes` , `direcciones_cliente`";
    $result = mysql_query($query);

  echo <<< HTML
  <div class="uk-panel-box-primary">
    <table width="90%" class="uk-table uk-table-divider uk-table-hover uk-table-responsive"><thead><tr>
    <th>Código del Cliente</th><th>Cédula</th><th>Nombre</th><th>Dirección</th><th>Ciudad</th>
    </tr></thead><tbody>
HTML;
      while ($row = mysql_fetch_array($result)) {
        echo "<tr><td>".$row["Codigo_Cliente"]."</td><td>" . $row["Cedula"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Direccion"] . "</td><td>" . $row["Cuidad"] . "</td></tr>";
      if (empty($row)) {
        echo '<tr><td align="center" colspan="5">No hay publicaciones</td></tr>';
      }
    }
    echo '</tbody></table></div>';
    }

    function ListarCitas(){
      require_once 'conexion.php';
      $db = new conexion();
      $db->Conectar();
      $query="SELECT `reparaciones_vehiculo`.*, `vehiculos`.*, `vehiculos_cliente`.*, `clientes`.*, `vehiculo_frecuenta_franquicia`.*, `franquicias`.*
              FROM `reparaciones_vehiculo` , `vehiculos_cliente` , `clientes`, `vehiculos`, `vehiculo_frecuenta_franquicia`, `franquicias`
              WHERE `reparaciones_vehiculo`.`Numero_Matricula` = `vehiculos_cliente`.`Numero_Matricula`
              AND `vehiculos_cliente`.`Codigo_Cliente`= `clientes`.`Codigo_Cliente`
              AND `reparaciones_vehiculo`.`Numero_Matricula`=  `vehiculos`.`Numero_Matricula`
              AND `vehiculo_frecuenta_franquicia`.`Numero_Matricula` = `reparaciones_vehiculo`.`Numero_Matricula`
              AND `franquicias`.`Codigo_Franquicia` = `vehiculo_frecuenta_franquicia`.`Codigo_Franquicia`";
      $result = mysql_query($query);

    echo <<< HTML
    <div class="uk-panel-box-primary">
      <table width="90%" class="uk-table uk-table-divider uk-table-hover uk-table-responsive"><thead><tr>
      <th># Matrícula</th><th>Fecha de Reparación</th><th>Tipo de Reparación</th><th>Observaciones</th><th>Precio</th><th>Código del Cliente</th><th>Localidad</th><th>Franquicia</th>
      </tr></thead><tbody>
HTML;
        while ($row = mysql_fetch_array($result)) {
          echo "<tr><td>".$row["Numero_Matricula"]."</td><td>" . $row["Fecha_Reparacion"] . "</td><td>" . $row["Tipo_Reparacion"] . "</td><td>" . $row["Observaciones"] . "</td><td>" . $row["Precio"] . "</td><td>" . $row["Codigo_Cliente"] . "</td><td>" . $row["Localidad"] . "</td><td>" . $row["Nombre"] . "</td></tr>";
        if (empty($row)) {
          echo '<tr><td align="center" colspan="5">No hay publicaciones</td></tr>';
        }
      }
      echo '</tbody></table></div>';
      }


}
  ?>
