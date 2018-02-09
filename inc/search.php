<?php
/**
 *
 */
class Search {
  private $con;

  function __construct($con) {
    $this->con=$con;
  }
  public function BuscarPorNombre($data = array()) {
    $sqlSearch = ' and nombre like "%'.$data['srch-nombre'].'%" and categoria="'.$data['formCategria'].'" ';
    return $sqlSearch ? $sqlSearch : false;
  }
}
 ?>
