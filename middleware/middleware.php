<?php

class middleware{

  function ValidarLogin($cedula, $codigo_empleado){
    $validado=0;
    #echo "entro al Script VALIDAR <br>";
    $query = 'SELECT * FROM empleados WHERE cedula LIKE  "' .$cedula. '" AND codigo_empleado LIKE "' .$codigo_empleado. '"';
    #echo $consulta_mysql;
    $resultado_query = mysql_query($query);
    $row = mysql_fetch_array($resultado_query);
        if (empty($row)) {
          #echo "<br>¡ No se encontraron resultados !";
        }else {
          #echo "<br>¡ Se encontraron resultados !";
          $validado=1;
        }
        $this->LogIn($validado, $cedula, $codigo_empleado);
  }

  public function LogIn($validado, $cedula, $codigo_empleado) {

    if ($validado=='1') {
      //echo "<br>entro al Script LOGIN<br>";
      $consulta_mysql = 'SELECT * FROM empleados WHERE cedula LIKE  "' .$cedula. '" AND codigo_empleado LIKE "' .$codigo_empleado. '"';
      //echo $consulta_mysql;
      $resultado_consulta_mysql = mysql_query($consulta_mysql);
      while ($row = mysql_fetch_array($resultado_consulta_mysql)) {
          $_SESSION['codigo_empleado'] = $row['Codigo_Empleado'];
          $_SESSION['cedula'] = $row['Cedula'];
          $_SESSION['nombre'] = $row['Nombre'];
          $_SESSION['fecha_contrato'] = $row['Fecha_Comienzo_Contrato'];
        }
    $this->ValidarAdmin($codigo_empleado);
    }else {
      header('Location: ../index.php');
    }
  }

  function ValidarAdmin($codigo_empleado) {

    $consulta_mysql='SELECT `empleados`.`Codigo_Empleado`, `franquicias`.`Director`, `franquicias`.`Localidad`, `franquicias`.`Nombre`
    FROM `empleados`
    LEFT JOIN franquicias ON `franquicias`.`Director` = `empleados`.`Codigo_Empleado`
    WHERE `franquicias`.`Director` LIKE "'.$codigo_empleado.'"';
      echo $consulta_mysql;
      $resultado_consulta_mysql = mysql_query($consulta_mysql);
      $row = mysql_fetch_array($resultado_consulta_mysql);
          if (empty($row)) {
            #echo "<br>¡ No se encontraron resultados !";
            $_SESSION['admin']=0;
            $_SESSION['franquicia_asignada'] = $row['Localidad'];
          }else {
            #echo "<br>¡ Se encontraron resultados !";
            $_SESSION['admin']=1;
            $_SESSION['franquicia_asignada'] = $row['Localidad'] .", ".$row['Nombre'] ;
          }

      header ('Location: ../vista/contenido.php');
    }

  function Registrar($fila = array(), $tabla="") {
    $ValoresFila = "";
    while (list($key, $val) = each($fila)) {
        $ValoresFila = $ValoresFila . "'" . $val . "', ";
    }
    $ValoresFila = substr($ValoresFila, 0, -2);
    //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
    mysql_query("insert into ".$tabla." values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
    //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
    //header('Location: ../index.php');
  }

  function Select_Codigo_Cliente() {

    $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
    // Consultar la base de datos
    $consulta_mysql = 'select * from clientes';
    $resultado_consulta_mysql = mysql_query($consulta_mysql);

    echo '<select id="codigo_cliente" name="codigo_cliente" class="uk-form-row uk-form-width-large">';
    while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
      echo "<option required class=''  value='" . $fila['Codigo_Cliente'] . "'>" . $fila['Codigo_Cliente'] . " - ".$fila['Nombre']  ."</option>";
    }
    echo "</select>";
    }

  function IdentificarTipo($fila = array()){
    if ($fila[1]=="Todo Terreno") {
      $this->Registrar(array($fila[2], $fila[0]), "tipo_todoterreno");
    }else{
      $this->Registrar(array($fila[3], $fila[0]), "tipo_utilitario");
    }
  }

  function Select_Numero_Matricula() {

    $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
    // Consultar la base de datos
    //$consulta_mysql = 'select * from vehiculos_cliente';
    $consulta_mysql = ' SELECT `vehiculos_cliente`.`Codigo_Cliente`, `vehiculos_cliente`.`Numero_Matricula`, `clientes`.`Nombre`
                        FROM `vehiculos_cliente`
                        LEFT JOIN `clientes` ON `vehiculos_cliente`.`Codigo_Cliente` = `clientes`.`Codigo_Cliente`';
    $resultado_consulta_mysql = mysql_query($consulta_mysql);

    echo '<select id="numero_matricula" name="numero_matricula" class="uk-form-row uk-form-width-large">';
    while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
      echo "<option required  value='" . $fila['Numero_Matricula'] . "'>" . $fila['Numero_Matricula'] . " de ".$fila['Nombre']  ."</option>";
    }
    echo "</select>";
    $this->Select_Codigo_Cliente();
  }

  function Select_Codigo_Franquicia() {

      $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
      // Consultar la base de datos
      $consulta_mysql = 'SELECT * FROM Franquicias';
      $resultado_consulta_mysql = mysql_query($consulta_mysql);

      echo '<select id="codigo_franquicia" name="codigo_franquicia" class="uk-form-row uk-form-width-large">';
      while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
        echo "<option required  value='" . $fila['Codigo_Franquicia'] . "'>" . $fila['Codigo_Franquicia'] . ", Localidad: ".$fila['Localidad']  .", Nombre: ". $fila['Nombre'] ."</option>";
      }
      echo "</select>";
  }


  function EliminarUsuario($id_usuario) {
      $query = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
      $result = mysql_query($query);
      header('Location: ../index.php');
  }

  function ActualizarUsuario($fila = array()){
    $query = "UPDATE `usuarios` SET `nombre` = '".$fila[1]."', `apellido` = '".$fila[2]."', `correo` = '".$fila[3]."', `password` = '".$fila[4]."', `genero` = '".$fila[5]."', `rol` = '".$fila[6]."' WHERE `usuarios`.`id` = ".$fila[0];
    mysql_query($query);
    header('Location: ../index.php');
  }

  function EditarUsuario($id_usuario) {
        session_destroy();
        session_start();
        $query = "SELECT * FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
        $result = mysql_query($query);
        echo "El ID del usuario a editar es el ". $id_usuario . ".";

        while ($row = mysql_fetch_array($result)) {
            $_SESSION['id']     = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['genero'] = $row['genero'];
            $_SESSION['rol']  = $row['rol'];
          }

  header('location: ../vista/editar.php');
  }

  private $usuario;
  private $contrasena;
  private $servidor;
  private $nomDB;
  private $link;

    function middleware() {
        $this->usuario = "root";
        $this->contrasena = "";
        $this->servidor = "localhost";
        $this->nomDB = "unimonito";
        $this->link = "";
    }

}
