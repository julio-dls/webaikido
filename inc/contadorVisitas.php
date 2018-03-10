<?php
/**
 *
 */
class contadorVisitas {

  private $con;

  function __construct($con){
    $this->con=$con;
  }

  function contarVisitas() {
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $fecha = date("Y-m-d");
    ini_set('date.timezone','America/Buenos_Aires');
    $hora =  date("g:i A");
    // $hora =  date("H:i:s");

    $sql = ("INSERT INTO `iwama_ryu_art_vistitas`(`ip`, `hora`, `fecha`) VALUES ('".$ipAddress."','".$hora."','".$fecha."') ");
    $contador = $this->con->exec($sql);
  }
}

?>
