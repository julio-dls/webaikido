<?php
/**
 *
 */
class VideosClass {

  private $con;

  function __construct($con ) {
    $this->con = $con;
  }

  public function MostrarMas($cantidad) {
    $sqlSecundario = ('SELECT url FROM `video` LIMIT '.($cantidad).' OFFSET 1');
    return $this->con->query($sqlSecundario);
  }
  public function getTotalVideos() {
    return $this->con->query('SELECT count(id) as totalId FROM `video`')->fetch();
  }

}
?>
