<?php
/**
 *
 */
class Search {
  private $con;

  function __construct($con) {
    $this->con=$con;
  }
  function BuscarPorNombre($data = array()) {
    $sqlSearch = ' and nombre like "%'.$data['srch-nombre'].'%" and categoria="'.$data['formCategria'].'" ';
    return $sqlSearch ? $sqlSearch : false;
  }
  function TotalFilasBuscarPorNombre($data = array()) {
    return ' and nombre like "%'.$data['srch-nombre'].'%" and categoria="'.$data['formCategria'].'" ';
  }
}
 ?>
