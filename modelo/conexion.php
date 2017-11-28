<?php

class conexion {

  private $usuario;
  private $contrasena;
  private $servidor;
  private $nomDB;
  private $link;

    function conexion() {
        $this->usuario = "root";
        $this->contrasena = "";
        $this->servidor = "localhost";
        $this->nomDB = "unimonito";
        $this->link = "";
    }

    function Conectar() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
        mysql_select_db($this->nomDB, $this->link) or die(mysql_error());
    }

    function CerrarConexion(){
      mysql_close();
    }

}
?>
